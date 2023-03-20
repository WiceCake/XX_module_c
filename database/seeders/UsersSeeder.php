<?php

// Create Pre-made data for Platform Users

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'username' => 'player1',
                'password' => Hash::make('helloworld1!'),
                'created_at' => now()->subDays(2)->subHours(35)->subMinutes(12)->subSeconds(49),
                'updated_at' => now()->subDays(2)->subHours(35)->subMinutes(12)->subSeconds(49)
            ],
            [
                'username' => 'player2',
                'password' => Hash::make('helloworld2!'),
                'created_at' => now()->subDays(2)->subHours(42)->subMinutes(58)->subSeconds(14),
                'updated_at' => now()->subDays(2)->subHours(42)->subMinutes(58)->subSeconds(14)
            ],
            [
                'username' => 'dev1',
                'password' => Hash::make('hellobyte1!'),
                'created_at' => now()->subDays(2)->subHours(30)->subMinutes(20)->subSeconds(59),
                'updated_at' => now()->subDays(2)->subHours(30)->subMinutes(20)->subSeconds(59)
            ],
            [
                'username' => 'dev2',
                'password' => Hash::make('hellobyte2!'),
                'created_at' => now()->subDays(2)->subHours(33)->subMinutes(39)->subSeconds(24),
                'updated_at' => now()->subDays(2)->subHours(33)->subMinutes(39)->subSeconds(24)
            ]
        ];

        DB::table('users')->insert($users);

    }
}
