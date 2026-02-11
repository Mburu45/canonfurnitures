<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Creates a default admin account for Canon Furnitures
     */
    public function run(): void
    {
        // Check if admin user already exists
        if (User::where('email', 'canonfurnitures@gmail.com')->exists()) {
            return;
        }

        User::create([
            'name' => 'Admin',
            'email' => 'canonfurnitures@gmail.com',
            'password' => bcrypt('secret123'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);
    }
}
