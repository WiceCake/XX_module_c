<?php

// Controller for finding and showing game scores to platform user and developers

namespace App\Http\Controllers\Api\Games;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Score;
use Illuminate\Http\Request;

class ScoresController extends Controller
{
    public function index($slug)
    {
        $game = Game::where('slug', $slug)->firstOrFail();
        if ($game->trashed()) {
            return response()->json([
                'status' => 'not-found',
                'message' => 'Not found',
            ], 404);
        }

        $players = [];
        $scores = Score::select('scores.*')
            ->leftJoin('game_versions', 'game_versions.id', 'scores.game_version_id')
            ->leftJoin('users', 'users.id', 'scores.user_id')
            ->where('game_versions.game_id', $game->id)
            ->whereNull('users.deleted_at')
            ->orderBy('score', 'desc')
            ->get()
            ->filter(function ($score) use (&$players) {
                if (in_array($score->user_id, $players)) {
                    return false;
                }
                $players[] = $score->user_id;
                return true;
            })
            ->map(function ($score) {
                return [
                    'username' => $score->user->username,
                    'score' => $score->score,
                    'timestamp' => $score->created_at,
                ];
            })
            ->values();

        return [
            'scores' => $scores,
        ];
    }

    public function store($slug, Request $request)
    {
        $game = Game::where('slug', $slug)->firstOrFail();

        $request->validate([
            'score' => 'required',
        ]);

        $score = new Score();
        $score->game_version_id = $game->latestVersion->id;
        $score->user_id = $request->user()->id;
        $score->score = $request->get('score');
        $score->save();

        return response()->json([
            'status' => 'success',
        ], 201);
    }
}
