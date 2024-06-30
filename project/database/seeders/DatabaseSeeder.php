<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password'=>"123",
            'role'=>'admin'
        ]);
        User::factory()->create([
            'name' => 'agent',
            'email' => 'agent@gmail.com',
            'password'=>"123",
            'role'=>'agent'
        ]);
        User::factory()->create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password'=>"123",
            'role'=>'user'
        ]);
    }
}
