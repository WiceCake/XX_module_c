<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Game;
use App\Models\Version;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function index()
    {
        return view('user.index', ['users' => User::withTrashed()->get()]);
    }

    public function show(User $user){
        $data = DB::table('scores')
        ->where('user_id', $user->id)
        ->join('users','scores.user_id',"=",'users.id')
        ->join('game_versions','scores.game_version_id', "=",'game_versions.id')
        ->join('games','game_versions.game_id',"=",'games.id')
        ->get();

        return view('user.detail', ['user' => $user, 'get' => $data]);
    }
}
