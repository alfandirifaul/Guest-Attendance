<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // CHANGE THE ADMIN AUTH BELOW
        User::factory()->create([
            'name' => 'admin', // USERNAME
            'email' => 'admin@smti.edu', // EMAIL
            'password' => Hash::make('admin'), // PASSWORD
        ]);
    }
}
