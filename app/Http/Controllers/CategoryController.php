<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($slug)
    {
        $category = \App\Models\Category::where('slug', $slug)->firstOrFail();
        $products = \App\Models\Product::where('category_id', $category->id)->where('is_active', true)->paginate(12);
        return view('category', compact('category', 'products'));
    }
}
