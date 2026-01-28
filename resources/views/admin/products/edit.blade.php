@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto py-8">

<h1 class="text-2xl font-bold mb-6">Edit Product</h1>

<form method="POST" action="{{ route('admin.products.update', $product->id) }}">

@csrf

@method('PUT')

<div class="mb-4">

<label class="block text-sm font-medium text-charcoal mb-2">Name</label>

<input type="text" name="name" value="{{ old('name', $product->name) }}" class="w-full border border-gray-300 rounded-md px-3 py-2" required>

</div>

<div class="mb-4">

<label class="block text-sm font-medium text-charcoal mb-2">Category</label>

<select name="category_id" class="w-full border border-gray-300 rounded-md px-3 py-2" required>

@foreach($categories as $category)

<option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>

@endforeach

</select>

</div>

<div class="mb-4">

<label class="block text-sm font-medium text-charcoal mb-2">Description</label>

<textarea name="description" class="w-full border border-gray-300 rounded-md px-3 py-2" rows="4" required>{{ old('description', $product->description) }}</textarea>

</div>

<div class="mb-4">

<label class="block text-sm font-medium text-charcoal mb-2">Price</label>

<input type="number" name="price" value="{{ old('price', $product->price) }}" step="0.01" class="w-full border border-gray-300 rounded-md px-3 py-2" required>

</div>

<div class="mb-4">

<label class="block text-sm font-medium text-charcoal mb-2">Stock</label>

<input type="number" name="stock" value="{{ old('stock', $product->stock) }}" class="w-full border border-gray-300 rounded-md px-3 py-2" required>

</div>

<div class="mb-4">

<label class="flex items-center">

<input type="checkbox" name="is_active" value="1" {{ old('is_active', $product->is_active) ? 'checked' : '' }} class="mr-2">

Active

</label>

</div>

<button type="submit" class="bg-oak-brown hover:bg-dark-oak text-off-white px-4 py-2 rounded-md">Update Product</button>

</form>

</div>

@endsection