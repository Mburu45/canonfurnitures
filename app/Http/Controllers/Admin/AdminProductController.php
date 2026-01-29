<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->paginate(15);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'is_active' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,gif|max:2048',
            'image_url' => 'nullable|url',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_active'] = $request->has('is_active');

        $product = Product::create($validated);

        // Handle image upload or URL
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . Str::slug($product->name) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);

            $product->images()->create([
                'image_path' => $filename,
                'is_primary' => true,
            ]);
        } elseif ($request->filled('image_url')) {
            $product->images()->create([
                'image_path' => $request->image_url,
                'is_primary' => true,
            ]);
        }

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'is_active' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,gif|max:2048',
            'image_url' => 'nullable|url',
        ]);

        $product = Product::findOrFail($id);
        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_active'] = $request->has('is_active');

        $product->update($validated);

        // Handle image upload or URL
        if ($request->hasFile('image')) {
            // Delete old image if exists
            $oldImage = $product->images()->first();
            if ($oldImage) {
                if (file_exists(public_path('images/' . $oldImage->image_path))) {
                    unlink(public_path('images/' . $oldImage->image_path));
                }
                $oldImage->delete();
            }

            $file = $request->file('image');
            $filename = time() . '_' . Str::slug($product->name) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);

            $product->images()->create([
                'image_path' => $filename,
                'is_primary' => true,
            ]);
        } elseif ($request->filled('image_url')) {
            // Delete old image if exists
            $oldImage = $product->images()->first();
            if ($oldImage) {
                if (file_exists(public_path('images/' . $oldImage->image_path))) {
                    unlink(public_path('images/' . $oldImage->image_path));
                }
                $oldImage->delete();
            }

            $product->images()->create([
                'image_path' => $request->image_url,
                'is_primary' => true,
            ]);
        }

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->images()->delete();
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}
