<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Article;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create a test user if it doesn't exist
        $user = User::firstOrCreate(
            ['email' => 'test@example.com'], // Check if user with this email exists
            ['name' => 'Test User', 'password' => bcrypt('password')] // Create with these values
        );

        // Create 5 fake articles for the test user
        $user->articles()->createMany(
            Article::factory()->count(5)->make()->toArray()
        );

        // Create additional users with articles
        User::factory(3)->create()->each(function ($user) {
            $user->articles()->createMany(
                Article::factory()->count(rand(1, 3))->make()->toArray()
            );
        });
    }
}
