<?php

namespace Database\Seeders;

use App\Models\Meet;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\UserMeet;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'username' => 'testuser',
                'bio' => 'This is a test user.',
                'phone_number' => '123-456-7890',
                'password' => 'password',
                'email_verified_at' => now(),
            ]
        );

        Meet::factory(5)->create();
        UserMeet::factory(15)->create();
    }
}
