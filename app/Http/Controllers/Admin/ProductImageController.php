<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'image_urls.*' => 'required|url',
        ]);

        foreach ($request->input('image_urls', []) as $url) {
            ProductImage::create([
                'product_id' => $product->id,
                'image_path' => $url,
                'is_primary' => false,
            ]);
        }

        return back()->with('success', 'Images attached successfully.');
    }

    public function destroy(ProductImage $image)
    {
        $image->delete();
        return back()->with('success', 'Image removed');
    }
}
