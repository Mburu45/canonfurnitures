@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-off-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-serif font-bold text-charcoal">Admin Dashboard</h1>
            <p class="text-gray-600 mt-2">Manage your Canon Furnitures inventory</p>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Total Products -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Total Products</p>
                        <p class="text-3xl font-bold text-charcoal mt-2">{{ $totalProducts }}</p>
                    </div>
                    <i class="fas fa-box text-4xl text-oak-brown opacity-20"></i>
                </div>
            </div>

            <!-- Active Products -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Active Products</p>
                        <p class="text-3xl font-bold text-oak-brown mt-2">{{ $activeProducts }}</p>
                    </div>
                    <i class="fas fa-check-circle text-4xl text-green-600 opacity-20"></i>
                </div>
            </div>

            <!-- Categories -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Categories</p>
                        <p class="text-3xl font-bold text-charcoal mt-2">{{ $totalCategories }}</p>
                    </div>
                    <i class="fas fa-tags text-4xl text-blue-600 opacity-20"></i>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-lg font-semibold text-charcoal mb-4">Quick Actions</h2>
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('admin.products.create') }}" class="bg-oak-brown hover:bg-dark-oak text-off-white px-4 py-2 rounded-md text-sm font-medium transition">
                    <i class="fas fa-plus mr-2"></i> Add New Product
                </a>
                <a href="{{ route('admin.products.index') }}" class="bg-charcoal hover:bg-gray-800 text-off-white px-4 py-2 rounded-md text-sm font-medium transition">
                    <i class="fas fa-list mr-2"></i> Manage Products
                </a>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="bg-red-600 hover:bg-red-700 text-off-white px-4 py-2 rounded-md text-sm font-medium transition">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </div>
        </div>

        <!-- Recent Products -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-lg font-semibold text-charcoal mb-4">Recent Products</h2>
            @if($recentProducts->count())
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="border-b border-gray-200">
                            <tr>
                                <th class="text-left py-3 px-4 font-medium text-gray-700">Name</th>
                                <th class="text-left py-3 px-4 font-medium text-gray-700">Category</th>
                                <th class="text-left py-3 px-4 font-medium text-gray-700">Price</th>
                                <th class="text-left py-3 px-4 font-medium text-gray-700">Stock</th>
                                <th class="text-left py-3 px-4 font-medium text-gray-700">Status</th>
                                <th class="text-left py-3 px-4 font-medium text-gray-700">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentProducts as $product)
                                <tr class="border-b border-gray-100 hover:bg-gray-50">
                                    <td class="py-3 px-4 text-charcoal">{{ $product->name }}</td>
                                    <td class="py-3 px-4 text-gray-600">{{ $product->category?->name ?? 'N/A' }}</td>
                                    <td class="py-3 px-4 text-charcoal font-semibold">KSh {{ number_format($product->price, 2) }}</td>
                                    <td class="py-3 px-4">
                                        <span class="inline-block px-2 py-1 text-xs font-medium {{ $product->stock > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $product->stock }} units
                                        </span>
                                    </td>
                                    <td class="py-3 px-4">
                                        @if($product->is_active)
                                            <span class="inline-block px-2 py-1 text-xs font-medium bg-blue-100 text-blue-800">Active</span>
                                        @else
                                            <span class="inline-block px-2 py-1 text-xs font-medium bg-gray-100 text-gray-800">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="py-3 px-4">
                                        <a href="{{ route('admin.products.edit', $product->id) }}" class="text-oak-brown hover:text-dark-oak text-sm font-medium">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-gray-600 text-center py-8">No products yet. <a href="{{ route('admin.products.create') }}" class="text-oak-brown hover:text-dark-oak font-medium">Create one</a></p>
            @endif
        </div>
    </div>
</div>
@endsection
