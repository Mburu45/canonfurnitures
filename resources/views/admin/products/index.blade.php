@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-off-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        <!-- Header with Add Button -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-serif font-bold text-charcoal">Products</h1>
                <p class="text-gray-600 mt-2">Manage all furniture products</p>
            </div>
            <a href="{{ route('admin.products.create') }}" class="bg-oak-brown hover:bg-dark-oak text-off-white px-6 py-3 rounded-md font-medium transition">
                <i class="fas fa-plus mr-2"></i> Add Product
            </a>
        </div>

        <!-- Success Message -->
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-md mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Products Table -->
        @if($products->count())
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="text-left py-4 px-6 font-semibold text-gray-700">Name</th>
                                <th class="text-left py-4 px-6 font-semibold text-gray-700">Category</th>
                                <th class="text-left py-4 px-6 font-semibold text-gray-700">Price</th>
                                <th class="text-left py-4 px-6 font-semibold text-gray-700">Stock</th>
                                <th class="text-left py-4 px-6 font-semibold text-gray-700">Status</th>
                                <th class="text-left py-4 px-6 font-semibold text-gray-700">Created</th>
                                <th class="text-left py-4 px-6 font-semibold text-gray-700">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($products as $product)
                                <tr class="hover:bg-gray-50">
                                    <td class="py-4 px-6 text-charcoal font-medium">{{ $product->name }}</td>
                                    <td class="py-4 px-6 text-gray-600">{{ $product->category?->name ?? 'N/A' }}</td>
                                    <td class="py-4 px-6 text-charcoal font-semibold">KES {{ number_format($product->price) }}</td>
                                    <td class="py-4 px-6">
                                        <span class="inline-block px-3 py-1 text-sm font-medium {{ $product->stock > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $product->stock }} units
                                        </span>
                                    </td>
                                    <td class="py-4 px-6">
                                        @if($product->is_active)
                                            <span class="inline-block px-3 py-1 text-sm font-medium bg-blue-100 text-blue-800">Active</span>
                                        @else
                                            <span class="inline-block px-3 py-1 text-sm font-medium bg-gray-100 text-gray-800">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="py-4 px-6 text-gray-600 text-sm">{{ $product->created_at->format('M d, Y') }}</td>
                                    <td class="py-4 px-6">
                                        <div class="flex gap-3">
                                            <a href="{{ route('admin.products.edit', $product->id) }}" class="text-oak-brown hover:text-dark-oak font-medium text-sm">
                                                <i class="fas fa-edit mr-1"></i> Edit
                                            </a>
                                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800 font-medium text-sm">
                                                    <i class="fas fa-trash mr-1"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $products->links() }}
            </div>
        @else
            <div class="bg-white rounded-lg shadow-md p-12 text-center">
                <i class="fas fa-inbox text-6xl text-gray-300 mb-4"></i>
                <h3 class="text-xl font-semibold text-gray-700 mb-2">No Products Yet</h3>
                <p class="text-gray-600 mb-6">Start by adding your first furniture product.</p>
                <a href="{{ route('admin.products.create') }}" class="bg-oak-brown hover:bg-dark-oak text-off-white px-6 py-3 rounded-md font-medium transition inline-block">
                    <i class="fas fa-plus mr-2"></i> Create First Product
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
