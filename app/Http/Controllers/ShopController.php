<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::where('is_active', true)->with(['category', 'images']);

        // Filter by category
        if ($request->has('category') && $request->category) {
            $category = Category::where('slug', $request->category)->first();
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        // Filter by price range
        if ($request->has('price_min') && $request->price_min) {
            $query->where('price', '>=', $request->price_min);
        }
        if ($request->has('price_max') && $request->price_max) {
            $query->where('price', '<=', $request->price_max);
        }

        // Filter by availability
        if ($request->has('availability') && $request->availability === 'in-stock') {
            $query->where('stock', '>', 0);
        } elseif ($request->has('availability') && $request->availability === 'out-of-stock') {
            $query->where('stock', '=', 0);
        }

        $products = $query->latest()->paginate(24);

        $categories = Category::all(); // For filter options

        return view('shop', compact('products', 'categories'));
    }
}
