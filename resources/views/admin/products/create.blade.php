@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-off-white">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        <h1 class="text-3xl font-serif font-bold text-charcoal mb-8">Add New Product</h1>

        <div class="bg-white rounded-lg shadow-md p-6">
            <form action="{{ route('admin.products.store') }}" method="POST">
                @csrf

                <!-- Product Name -->
                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-charcoal mb-2">Product Name *</label>
                    <input type="text" id="name" name="name" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-oak-brown @error('name') border-red-500 @enderror" value="{{ old('name') }}" required>
                    @error('name')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category -->
                <div class="mb-6">
                    <label for="category_id" class="block text-sm font-medium text-charcoal mb-2">Category *</label>
                    <select id="category_id" name="category_id" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-oak-brown @error('category_id') border-red-500 @enderror" required>
                        <option value="">Select a category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Price -->
                <div class="grid grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="price" class="block text-sm font-medium text-charcoal mb-2">Price (KES) *</label>
                        <input type="number" id="price" name="price" step="0.01" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-oak-brown @error('price') border-red-500 @enderror" value="{{ old('price') }}" required>
                        @error('price')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Stock -->
                    <div>
                        <label for="stock" class="block text-sm font-medium text-charcoal mb-2">Stock Quantity *</label>
                        <input type="number" id="stock" name="stock" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-oak-brown @error('stock') border-red-500 @enderror" value="{{ old('stock') }}" required>
                        @error('stock')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Description -->
                <div class="mb-6">
                    <label for="description" class="block text-sm font-medium text-charcoal mb-2">Description *</label>
                    <textarea id="description" name="description" rows="5" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-oak-brown @error('description') border-red-500 @enderror" required>{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Active Status -->
                <div class="mb-6">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_active" value="1" class="rounded" {{ old('is_active') ? 'checked' : '' }}>
                        <span class="ml-2 text-sm font-medium text-charcoal">Active (visible on shop)</span>
                    </label>
                </div>

                <!-- Buttons -->
                <div class="flex gap-4">
                    <button type="submit" class="bg-oak-brown hover:bg-dark-oak text-off-white px-6 py-2 rounded-md font-medium transition">
                        <i class="fas fa-save mr-2"></i> Create Product
                    </button>
                    <a href="{{ route('admin.products.index') }}" class="border border-gray-300 hover:bg-gray-100 text-charcoal px-6 py-2 rounded-md font-medium transition">
                        Cancel
                    </a>
                </div>
            </form>
        </div>

        <p class="text-gray-500 mt-4 text-sm">After creating the product, you can upload images from the edit page.</p>
    </div>
</div>
@endsection
