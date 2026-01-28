<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bedCategory = \App\Models\Category::where('slug', 'bed')->first();
        $sofaCategory = \App\Models\Category::where('slug', 'sofa')->first();
        $diningCategory = \App\Models\Category::where('slug', 'diningset')->first();
        $tvstandCategory = \App\Models\Category::where('slug', 'tvstand')->first();

        // Beds
        \App\Models\Product::create([
            'category_id' => $bedCategory->id,
            'name' => 'Oak King Size Bed',
            'slug' => 'oak-king-size-bed',
            'description' => 'Beautiful oak wood king size bed with storage.',
            'price' => 45000,
            'stock' => 5,
            'is_active' => true,
        ]);

        \App\Models\Product::create([
            'category_id' => $bedCategory->id,
            'name' => 'Modern Queen Bed',
            'slug' => 'modern-queen-bed',
            'description' => 'Sleek modern design queen size bed.',
            'price' => 35000,
            'stock' => 3,
            'is_active' => true,
        ]);

        // Sofas
        \App\Models\Product::create([
            'category_id' => $sofaCategory->id,
            'name' => 'Leather 3-Seater Sofa',
            'slug' => 'leather-3-seater-sofa',
            'description' => 'Premium leather 3-seater sofa.',
            'price' => 75000,
            'stock' => 2,
            'is_active' => true,
        ]);

        \App\Models\Product::create([
            'category_id' => $sofaCategory->id,
            'name' => 'Fabric Recliner Sofa',
            'slug' => 'fabric-recliner-sofa',
            'description' => 'Comfortable fabric recliner sofa.',
            'price' => 55000,
            'stock' => 4,
            'is_active' => true,
        ]);

        // Dining Sets
        \App\Models\Product::create([
            'category_id' => $diningCategory->id,
            'name' => '6-Seater Dining Set',
            'slug' => '6-seater-dining-set',
            'description' => 'Elegant 6-seater dining set with chairs.',
            'price' => 65000,
            'stock' => 1,
            'is_active' => true,
        ]);

        // TV Stands
        \App\Models\Product::create([
            'category_id' => $tvstandCategory->id,
            'name' => 'Modern TV Stand',
            'slug' => 'modern-tv-stand',
            'description' => 'Modern TV stand with storage.',
            'price' => 25000,
            'stock' => 6,
            'is_active' => true,
        ]);
    }
}
