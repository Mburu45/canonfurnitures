@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-off-white">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <h1 class="text-3xl font-serif font-bold text-charcoal mb-8">Shop</h1>

        <div class="flex flex-col lg:flex-row gap-8">

            <!-- Filters Sidebar -->

            <div class="w-full lg:w-1/4 bg-white p-6 rounded-md shadow-md">

                <h2 class="text-xl font-medium text-charcoal mb-4">Filters</h2>

                <form method="GET" action="{{ route('shop.index') }}">

                    <div class="mb-4">

                        <label class="block text-sm font-medium text-charcoal mb-2">Category</label>

                        <select name="category" class="w-full border border-gray-300 rounded-md px-3 py-2">

                            <option value="">All Categories</option>

                            @foreach($categories as $cat)

                                <option value="{{ $cat->slug }}" {{ request('category') == $cat->slug ? 'selected' : '' }}>{{ $cat->name }}</option>

                            @endforeach

                        </select>

                    </div>

                    <div class="mb-4">

                        <label class="block text-sm font-medium text-charcoal mb-2">Price Range</label>

                        <div class="flex gap-2">

                            <input type="number" name="price_min" value="{{ request('price_min') }}" placeholder="Min" class="w-1/2 border border-gray-300 rounded-md px-3 py-2">

                            <input type="number" name="price_max" value="{{ request('price_max') }}" placeholder="Max" class="w-1/2 border border-gray-300 rounded-md px-3 py-2">

                        </div>

                    </div>

                    <div class="mb-4">

                        <label class="block text-sm font-medium text-charcoal mb-2">Availability</label>

                        <select name="availability" class="w-full border border-gray-300 rounded-md px-3 py-2">

                            <option value="">All</option>

                            <option value="in-stock" {{ request('availability') == 'in-stock' ? 'selected' : '' }}>In Stock</option>

                            <option value="out-of-stock" {{ request('availability') == 'out-of-stock' ? 'selected' : '' }}>Out of Stock</option>

                        </select>

                    </div>

                    <button type="submit" class="w-full bg-oak-brown hover:bg-dark-oak text-off-white px-4 py-2 rounded-md">Apply Filters</button>

                </form>

            </div>

            <!-- Product Grid -->

            <div class="w-full lg:w-3/4">

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

@foreach($products as $product)


                        @php

                            $img = $product->images()->first();
                            $filename = $img ? $img->image_path : 'placeholder.jpg';
                            $name = ucwords(str_replace(['_', '-', '.jpeg', '.jpg', '.png'], [' ', ' ', '', '', ''], pathinfo($filename, PATHINFO_FILENAME)));
                            $price = rand(15000, 100000); // Random price for demo

                        @endphp

                        <div class="bg-white rounded-md shadow-md overflow-hidden">

                            <img src="{{ asset('images/'.$filename) }}" alt="{{ $name }}" class="w-full h-48 object-cover">

                            <div class="p-4">

                                <h3 class="text-lg font-medium text-charcoal">{{ $name }}</h3>

                                <p class="text-oak-brown font-bold">KES {{ number_format($price) }}</p>

                                <p class="text-sm text-gray-600">In Stock</p>

                                @php

                                    $phone = config('services.whatsapp.number');

                                    $message = "Hello Canon Furnitures 👋\n\n"

                                        ."I am interested in:\n\n"

                                        ."🪑 Product: {$name}\n"

                                        ."💰 Price: KES {$price}\n\n"

                                        ."Please assist me with availability and delivery.";

                                @endphp

                                <a

                                    href="https://wa.me/{{ $phone }}?text={{ urlencode($message) }}"

                                    target="_blank"

                                    class="mt-2 inline-block bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md text-sm flex items-center gap-2"

                                >

                                    <i class="fa-brands fa-whatsapp"></i>

                                    Order on WhatsApp

                                </a>

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>

        </div>

    </div>

@include('layouts.footer')

</div>

@endsection