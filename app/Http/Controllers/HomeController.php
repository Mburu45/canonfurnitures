<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch featured products, best sellers, categories
        $categories = \App\Models\Category::all();
        $featuredProducts = \App\Models\Product::where('is_active', true)->take(4)->get();
        $bestSellers = \App\Models\Product::where('is_active', true)->orderBy('id', 'desc')->take(4)->get();
        return view('home', compact('categories', 'featuredProducts', 'bestSellers'));
    }
}
