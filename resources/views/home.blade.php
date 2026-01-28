@extends('layouts.app')

@section('content')

<div class="min-h-screen">

    <!-- Hero Section -->

    <section class="relative bg-cover bg-center h-96" style="background-image: url('/images/Fsofa1.jpeg');">

        <div class="absolute inset-0 bg-black bg-opacity-50"></div>

        <div class="relative z-10 flex items-center justify-center h-full text-center text-off-white">

            <div>

                <h1 class="text-4xl md:text-6xl font-serif font-bold mb-4">Beautiful home furnitures for sale</h1>

                <p class="text-lg md:text-xl mb-8">Discover timeless pieces crafted with care and in great condition
                    <br>
                    Strong, comfortable and designed to add elegance to your living space
                    <br>
                    Ideal for living rooms, bedrooms, dining areas, and more.
                </p>

                <a href="/shop" class="bg-oak-brown hover:bg-dark-oak text-off-white px-8 py-3 rounded-md font-medium transition">Shop Now</a>

            </div>

        </div>

    </section>

    <!-- Shop by Category -->

    <section class="py-16 bg-off-white">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <h2 class="text-3xl font-serif font-bold text-charcoal text-center mb-12">Shop by Category</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-8">

                <div class="text-center">

                    <img src="/images/bed1.jpeg" alt="Beds" class="w-full h-48 object-cover rounded-md mb-4">

                    <h3 class="text-lg font-medium text-charcoal">Beds</h3>

                    <a href="/shop" class="text-oak-brown hover:text-dark-oak">Shop Beds</a>

                </div>

                <div class="text-center">

                    <img src="/images/sofa.jpeg" alt="Sofas" class="w-full h-48 object-cover rounded-md mb-4">

                    <h3 class="text-lg font-medium text-charcoal">Sofas</h3>

                    <a href="/shop" class="text-oak-brown hover:text-dark-oak">Shop Sofas</a>

                </div>

                <div class="text-center">

                    <img src="/images/diningset.jpeg" alt="Dining Sets" class="w-full h-48 object-cover rounded-md mb-4">

                    <h3 class="text-lg font-medium text-charcoal">Dining Sets</h3>

                    <a href="/shop" class="text-oak-brown hover:text-dark-oak">Shop Dining Sets</a>

                </div>

                <div class="text-center">

                    <img src="/images/diningset1.jpeg" alt="Tables" class="w-full h-48 object-cover rounded-md mb-4">

                    <h3 class="text-lg font-medium text-charcoal">Tables</h3>

                    <a href="/shop" class="text-oak-brown hover:text-dark-oak">Shop Tables</a>

                </div>

                <div class="text-center">

                    <img src="/images/tvstand.jpeg" alt="TV Stands" class="w-full h-48 object-cover rounded-md mb-4">

                    <h3 class="text-lg font-medium text-charcoal">TV Stands</h3>

                    <a href="/shop" class="text-oak-brown hover:text-dark-oak">Shop TV Stands</a>

                </div>

            </div>

        </div>

    </section>

    <!-- Best Sellers -->

    <section class="py-16 bg-white">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <h2 class="text-3xl font-serif font-bold text-charcoal text-center mb-12">Best Sellers</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

                <!-- Product 1 -->

                <div class="bg-off-white rounded-md shadow-md overflow-hidden">

                    <img src="/images/bed1.jpeg" alt="Oak Bed Frame" class="w-full h-48 object-cover">

                    <div class="p-4">

                        <h3 class="text-lg font-medium text-charcoal">Oak Bed Frame</h3>

                        <p class="text-oak-brown font-bold">Ksh. 35,000 </p>

                        <a href="/shop" class="mt-2 inline-block bg-oak-brown hover:bg-dark-oak text-off-white px-4 py-2 rounded-md text-sm">View Details</a>

                    </div>

                </div>

                <!-- Product 2 -->

                <div class="bg-off-white rounded-md shadow-md overflow-hidden">

                    <img src="/images/sofa.jpeg" alt="Leather Sofa" class="w-full h-48 object-cover">

                    <div class="p-4">

                        <h3 class="text-lg font-medium text-charcoal">Leather Sofa</h3>

                        <p class="text-oak-brown font-bold">Ksh 90,000</p>

                        <a href="/shop" class="mt-2 inline-block bg-oak-brown hover:bg-dark-oak text-off-white px-4 py-2 rounded-md text-sm">View Details</a>

                    </div>

                </div>

                <!-- Product 3 -->

                <div class="bg-off-white rounded-md shadow-md overflow-hidden">

                    <img src="/images/diningset.jpeg" alt="Dining Table" class="w-full h-48 object-cover">

                    <div class="p-4">

                        <h3 class="text-lg font-medium text-charcoal">Dining Table</h3>

                        <p class="text-oak-brown font-bold">Ksh 25,000</p>

                        <a href="/shop" class="mt-2 inline-block bg-oak-brown hover:bg-dark-oak text-off-white px-4 py-2 rounded-md text-sm">View Details</a>

                    </div>

                </div>

                <!-- Product 4 -->

                <div class="bg-off-white rounded-md shadow-md overflow-hidden">

                    <img src="/images/tvstand.jpeg" alt="TV Stand" class="w-full h-48 object-cover">

                    <div class="p-4">

                        <h3 class="text-lg font-medium text-charcoal">TV Stand</h3>

                        <p class="text-oak-brown font-bold">Ksh 20,000</p>

                        <a href="/shop" class="mt-2 inline-block bg-oak-brown hover:bg-dark-oak text-off-white px-4 py-2 rounded-md text-sm">View Details</a>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- Why Oak Furnitures -->

    <section class="py-16 bg-forest-green text-off-white">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">

            <h2 class="text-3xl font-serif font-bold mb-8">Why Canon Furnitures</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                <div>

                    <i class="fas fa-leaf text-4xl mb-4"></i>

                    <h3 class="text-xl font-medium mb-2">Natural Materials</h3>

                    <p>Crafted from sustainable wood for durability and beauty.</p>

                </div>

                <div>

                    <i class="fas fa-tools text-4xl mb-4"></i>

                    <h3 class="text-xl font-medium mb-2">Expert Craftsmanship</h3>

                    <p>Each piece is handmade by skilled artisans.</p>

                </div>

                <div>

                    <i class="fas fa-shield-alt text-4xl mb-4"></i>

                    <h3 class="text-xl font-medium mb-2">Lifetime Warranty</h3>

                    <p>Quality guaranteed for years of enjoyment.</p>

                </div>

            </div>

        </div>

    </section>

    <!-- CTA -->

    <section class="py-16 bg-oak-brown text-off-white text-center">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <h2 class="text-3xl font-serif font-bold mb-4">Ready to Transform Your Space?</h2>

            <p class="text-lg mb-8">Browse our collection and find the perfect pieces.</p>

            <a href="/shop" class="bg-dark-oak hover:bg-charcoal text-off-white px-8 py-3 rounded-md font-medium transition">Browse Collection</a>

        </div>

    </section>

@include('layouts.footer')

</div>

@endsection