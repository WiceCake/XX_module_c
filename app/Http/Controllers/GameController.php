<?php

// Controller for redirecting to game page, searching games, and showing game-details

namespace App\Http\Controllers;

use App\Models\Game;

class GameController extends Controller
{
    public function index(){
        if(request('search')){
            $game = Game::withTrashed()
            ->where('title', 'like', '%' . request('search') . '%')->get();
        }else{
            $game = Game::all();
        }

        return view('game.index', ['games' => $game]);
    }

    public function show(Game $game)
    {
        return view('game.detail', ['game' => $game]);
    }

    public function destroy(Game $game)
    {
        $game->delete();

        return redirect()->back();
    }
}
