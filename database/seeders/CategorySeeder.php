<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Category::create([
            'name' => 'Beds',
            'slug' => 'bed',
            'description' => 'Comfortable and stylish beds for your home.',
        ]);

        \App\Models\Category::create([
            'name' => 'Sofas',
            'slug' => 'sofa',
            'description' => 'Elegant sofas for relaxation.',
        ]);

        \App\Models\Category::create([
            'name' => 'Dining Sets',
            'slug' => 'diningset',
            'description' => 'Complete dining sets for family meals.',
        ]);

        \App\Models\Category::create([
            'name' => 'TV Stands',
            'slug' => 'tvstand',
            'description' => 'Modern TV stands for your entertainment area.',
        ]);
    }
}
