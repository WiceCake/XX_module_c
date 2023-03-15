<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\GameVersion;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $player1 = User::where('username', 'player1')->firstOrFail()->id;
        $player2 = User::where('username', 'player2')->firstOrFail()->id;
        $dev1 = User::where('username', 'dev1')->firstOrFail()->id;
        $dev2 = User::where('username', 'dev2')->firstOrFail()->id;
        $game1 = Game::where('slug', 'demo-game-1')->firstOrFail()->id;
        $game2 = Game::where('slug', 'demo-game-2')->firstOrFail()->id;
        $game1v1 = GameVersion::where('game_id', $game1)->where('version', 'v1')->withTrashed()->firstOrFail()->id;
        $game1v2 = GameVersion::where('game_id', $game1)->where('version', 'v2')->firstOrFail()->id;
        $game2v1 = GameVersion::where('game_id', $game2)->where('version', 'v1')->firstOrFail()->id;

        $scores = [
            [
                'user_id' => $player1,
                'game_version_id' => $game1v1,
                'score' => 10.0,
                'created_at' => now()->subDays(1)->subHours(1)->subMinutes(20),
                'updated_at' => now()->subDays(1)->subHours(1)->subMinutes(20)
            ],
            [
                'user_id' => $player1,
                'game_version_id' => $game1v1,
                'score' => 15.0,
                'created_at' => now()->subDays(1)->subHours(1)->subMinutes(40),
                'updated_at' => now()->subDays(1)->subHours(1)->subMinutes(40)
            ],
            [
                'user_id' => $player1,
                'game_version_id' => $game1v2,
                'score' => 12.0,
                'created_at' => now()->subDays(2)->subHours(1)->subMinutes(15),
                'updated_at' => now()->subDays(2)->subHours(1)->subMinutes(15)
            ],
            [
                'user_id' => $player2,
                'game_version_id' => $game1v2,
                'score' => 20.0,
                'created_at' => now()->subDays(2)->subHours(2)->subMinutes(05),
                'updated_at' => now()->subDays(2)->subHours(2)->subMinutes(05)
            ],
            [
                'user_id' => $player2,
                'game_version_id' => $game2v1,
                'score' => 30.0,
                'created_at' => now()->subDays(2)->subHours(8)->subMinutes(05),
                'updated_at' => now()->subDays(2)->subHours(8)->subMinutes(05)
            ],
            [
                'user_id' => $dev1,
                'game_version_id' => $game1v2,
                'score' => 1000.0,
                'created_at' => now()->subDays(2)->subHours(1)->subMinutes(01),
                'updated_at' => now()->subDays(2)->subHours(1)->subMinutes(01)
            ],
            [
                'user_id' => $dev1,
                'game_version_id' => $game1v2,
                'score' => -300.0,
                'created_at' => now()->subDays(2)->subHours(1)->subMinutes(03),
                'updated_at' => now()->subDays(2)->subHours(1)->subMinutes(03)
            ],
            [
                'user_id' => $dev2,
                'game_version_id' => $game1v2,
                'score' => 5.0,
                'created_at' => now()->subDays(2)->subHours(6)->subMinutes(20),
                'updated_at' => now()->subDays(2)->subHours(6)->subMinutes(20)
            ],
            [
                'user_id' => $dev2,
                'game_version_id' => $game2v1,
                'score' => 5.0,
                'created_at' => now()->subDays(2)->subHours(9)->subMinutes(25),
                'updated_at' => now()->subDays(2)->subHours(9)->subMinutes(25)
            ]
        ];

        DB::table('scores')->insert($scores);
    }
}
