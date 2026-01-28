<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'price',
        'stock',
        'is_active'
    ];

    // Relationship: a product belongs to a category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relationship: a product can have many images
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    // Optional: get primary image easily
    public function primaryImage()
    {
        return $this->hasOne(ProductImage::class)->where('is_primary', true);
    }
}
