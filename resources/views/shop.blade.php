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
                            $img = $product->images->first();
                            $imageUrl = $img && $img->image_path
                                ? $img->image_path
                                : asset('images/placeholder.jpg');
                            $price = $product->price;
                        @endphp

                        <div class="bg-white rounded-md shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl hover:scale-105 cursor-pointer">

                            <img src="{{ $imageUrl }}" alt="{{ $product->name }}" class="w-full h-48 object-cover transition-transform duration-300 hover:scale-110 lightbox-image" data-image="{{ $imageUrl }}">

                            <div class="p-4">

                                <h3 class="text-lg font-medium text-charcoal">{{ $product->name }}</h3>

                                <p class="text-oak-brown font-bold">KES {{ number_format($price, 2) }}</p>

                                <p class="text-sm text-gray-600">In Stock</p>

                                @php
                                    $phone = config('services.whatsapp.number');
                                    $message = "Hello Canon Furnitures 👋\n\n"
                                        ."I am interested in:\n\n"
                                        ."🪑 Product: {$product->name}\n"
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

</div>

@include('layouts.footer')

<!-- Lightbox Modal -->
<div id="lightbox" class="fixed inset-0 bg-black bg-opacity-75 hidden justify-center items-center z-50">
    <div class="relative max-w-4xl max-h-[90vh]">
        <img id="lightbox-image" src="" alt="" class="max-w-full max-h-[90vh] object-contain rounded-lg">
        <button id="lightbox-close" class="absolute top-4 right-4 bg-white hover:bg-gray-200 text-black px-4 py-2 rounded-full text-2xl font-bold transition">
            &times;
        </button>
        <button id="lightbox-prev" class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white hover:bg-gray-200 text-black px-4 py-3 rounded-full text-2xl font-bold transition">
            &#10094;
        </button>
        <button id="lightbox-next" class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white hover:bg-gray-200 text-black px-4 py-3 rounded-full text-2xl font-bold transition">
            &#10095;
        </button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const lightbox = document.getElementById('lightbox');
        const lightboxImage = document.getElementById('lightbox-image');
        const lightboxClose = document.getElementById('lightbox-close');
        const lightboxPrev = document.getElementById('lightbox-prev');
        const lightboxNext = document.getElementById('lightbox-next');
        const images = document.querySelectorAll('.lightbox-image');
        let currentImageIndex = 0;
        let allImages = [];

        // Collect all images
        images.forEach((img, index) => {
            allImages.push(img.dataset.image);
        });

        // Open lightbox
        images.forEach((img, index) => {
            img.addEventListener('click', function(e) {
                e.stopPropagation();
                currentImageIndex = index;
                lightboxImage.src = allImages[currentImageIndex];
                lightbox.style.display = 'flex';
            });
        });

        // Close lightbox
        lightboxClose.addEventListener('click', function() {
            lightbox.style.display = 'none';
        });

        lightbox.addEventListener('click', function(e) {
            if (e.target === lightbox) {
                lightbox.style.display = 'none';
            }
        });

        // Navigation
        lightboxPrev.addEventListener('click', function(e) {
            e.stopPropagation();
            currentImageIndex = (currentImageIndex - 1 + allImages.length) % allImages.length;
            lightboxImage.src = allImages[currentImageIndex];
        });

        lightboxNext.addEventListener('click', function(e) {
            e.stopPropagation();
            currentImageIndex = (currentImageIndex + 1) % allImages.length;
            lightboxImage.src = allImages[currentImageIndex];
        });

        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (lightbox.style.display === 'flex') {
                if (e.key === 'ArrowLeft') lightboxPrev.click();
                if (e.key === 'ArrowRight') lightboxNext.click();
                if (e.key === 'Escape') lightboxClose.click();
            }
        });
    });
</script>

@endsection
