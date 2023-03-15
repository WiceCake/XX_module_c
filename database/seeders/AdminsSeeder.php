<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            [
                'username' => 'admin1',
                'password' => Hash::make('hellouniverse1!'),
                'created_at' => now()->subDays(5)->subHours(3),
                'updated_at' => now()->subDays(5)->subHours(3)
            ],
            [
                'username' => 'admin2',
                'password' => Hash::make('hellouniverse2!'),
                'created_at' => now()->subDays(5)->subHours(1)->subMinutes(27)->subSeconds(48),
                'updated_at' => now()->subDays(5)->subHours(3)->subMinutes(27)->subSeconds(48)
            ]
        ]);
    }
}
