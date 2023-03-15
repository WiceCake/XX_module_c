<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dev1 = User::where('username','dev1')->firstOrFail();
        $dev2 = User::where('username','dev2')->firstOrFail();
        $games = [
            [
                'title' => 'Demo Game 1',
                'slug' => 'demo-game-1',
                'description' => 'This is demo game 1',
                'created_by' => $dev1->id,
                'created_at' => now()->subDays(1)->subHours(1)->subMinutes(23),
                'updated_at' => now()->subDays(1)->subHours(1)->subMinutes(23)
            ],
            [
                'title' => 'Demo Game 2',
                'slug' => 'demo-game-2',
                'description' => 'This is demo game 2',
                'created_by' => $dev2->id,
                'created_at' => now()->subDays(1)->subHours(1)->subMinutes(05),
                'updated_at' => now()->subDays(1)->subHours(1)->subMinutes(05)
            ]
        ];

        DB::table('games')->insert($games);
    }
}
