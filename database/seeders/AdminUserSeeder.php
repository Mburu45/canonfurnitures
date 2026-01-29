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
        if (User::where('email', 'admin@canonfurnitures.com')->exists()) {
            return;
        }

        User::create([
            'name' => 'Admin',
            'email' => 'admin@canonfurnitures.com',
            'password' => bcrypt('admin123456'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);
    }
}
