<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'username' => 'Test User',
            'handle' => '@test',
            'email' => 'test@example.com',
            'password_hash' => bcrypt('12345'),
            'age' => 18,
            'first_name' => 'Testing',
            'last_name' => 'Account',
            'birthdate' => 20060101,
            'privacy' => 'public',
        ]);
    }
}
