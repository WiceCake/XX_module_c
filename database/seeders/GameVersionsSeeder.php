<?php

// Create Pre-made data for Game Versions

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameVersionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $game1 = Game::where('slug', 'demo-game-1')->firstOrFail()->id;
        $game2 = Game::where('slug', 'demo-game-2')->firstOrFail()->id;

        $versions = [
            [
                'game_id' => $game1,
                'version' => 'v1',
                'storage_path' => 'games/'.$game1.'/v1/',
                'created_at' => now()->subDays(1)->subHours(1)->subMinutes(23),
                'updated_at' => now()->subDays(1)->subHours(1)->subMinutes(23),
                'deleted_at' => now()->subDays(1)->subHours(1)->subMinutes(10)
            ],
            [
                'game_id' => $game1,
                'version' => 'v2',
                'storage_path' => 'games/'.$game1.'/v2/',
                'created_at' => now()->subDays(1)->subHours(1)->subMinutes(10),
                'updated_at' => now()->subDays(1)->subHours(1)->subMinutes(10),
                'deleted_at' => null
            ],
            [
                'game_id' => $game2,
                'version' => 'v1',
                'storage_path' => 'games/'.$game2.'/v1/',
                'created_at' => now()->subDays(1)->subHours(05)->subMinutes(05),
                'updated_at' => now()->subDays(1)->subHours(05)->subMinutes(05),
                'deleted_at' => null
            ]
        ];

        DB::table('game_versions')->insert($versions);
    }
}
