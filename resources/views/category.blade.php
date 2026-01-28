<x-layouts.app>

<div class="min-h-screen bg-off-white">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <h1 class="text-3xl font-serif font-bold text-charcoal mb-4">Category: {{ ucfirst(str_replace('-', ' ', $slug)) }}</h1>

        <p class="text-lg text-gray-600 mb-8">Discover our premium {{ ucfirst(str_replace('-', ' ', $slug)) }} collection.</p>

        <div class="flex flex-col lg:flex-row gap-8">

            <!-- Filters Sidebar -->

            <div class="w-full lg:w-1/4 bg-white p-6 rounded-md shadow-md">

                <h2 class="text-xl font-medium text-charcoal mb-4">Filters</h2>

                <form x-data="{ priceMin: '', priceMax: '', availability: '' }">

                    <div class="mb-4">

                        <label class="block text-sm font-medium text-charcoal mb-2">Price Range</label>

                        <div class="flex gap-2">

                            <input type="number" x-model="priceMin" placeholder="Min" class="w-1/2 border border-gray-300 rounded-md px-3 py-2">

                            <input type="number" x-model="priceMax" placeholder="Max" class="w-1/2 border border-gray-300 rounded-md px-3 py-2">

                        </div>

                    </div>

                    <div class="mb-4">

                        <label class="block text-sm font-medium text-charcoal mb-2">Availability</label>

                        <select x-model="availability" class="w-full border border-gray-300 rounded-md px-3 py-2">

                            <option value="">All</option>

                            <option value="in-stock">In Stock</option>

                            <option value="out-of-stock">Out of Stock</option>

                        </select>

                    </div>

                    <button type="submit" class="w-full bg-oak-brown hover:bg-dark-oak text-off-white px-4 py-2 rounded-md">Apply Filters</button>

                </form>

            </div>

            <!-- Product Grid -->

            <div class="w-full lg:w-3/4">

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                    <!-- Product 1 -->

                    <div class="bg-white rounded-md shadow-md overflow-hidden">

                        <img src="https://via.placeholder.com/300x300?text=Product+1" alt="Product 1" class="w-full h-48 object-cover">

                        <div class="p-4">

                            <h3 class="text-lg font-medium text-charcoal">Oak Bed Frame</h3>

                            <p class="text-oak-brown font-bold">$499</p>

                            <p class="text-sm text-gray-600">In Stock</p>

                            <a href="/product/oak-bed-frame" class="mt-2 inline-block bg-oak-brown hover:bg-dark-oak text-off-white px-4 py-2 rounded-md text-sm">View Details</a>

                        </div>

                    </div>

                    <!-- Product 2 -->

                    <div class="bg-white rounded-md shadow-md overflow-hidden">

                        <img src="https://via.placeholder.com/300x300?text=Product+2" alt="Product 2" class="w-full h-48 object-cover">

                        <div class="p-4">

                            <h3 class="text-lg font-medium text-charcoal">Leather Sofa</h3>

                            <p class="text-oak-brown font-bold">$899</p>

                            <p class="text-sm text-gray-600">In Stock</p>

                            <a href="/product/leather-sofa" class="mt-2 inline-block bg-oak-brown hover:bg-dark-oak text-off-white px-4 py-2 rounded-md text-sm">View Details</a>

                        </div>

                    </div>

                    <!-- Product 3 -->

                    <div class="bg-white rounded-md shadow-md overflow-hidden">

                        <img src="https://via.placeholder.com/300x300?text=Product+3" alt="Product 3" class="w-full h-48 object-cover">

                        <div class="p-4">

                            <h3 class="text-lg font-medium text-charcoal">Dining Table</h3>

                            <p class="text-oak-brown font-bold">$699</p>

                            <p class="text-sm text-gray-600">In Stock</p>

                            <a href="/product/dining-table" class="mt-2 inline-block bg-oak-brown hover:bg-dark-oak text-off-white px-4 py-2 rounded-md text-sm">View Details</a>

                        </div>

                    </div>

                    <!-- Product 4 -->

                    <div class="bg-white rounded-md shadow-md overflow-hidden">

                        <img src="https://via.placeholder.com/300x300?text=Product+4" alt="Product 4" class="w-full h-48 object-cover">

                        <div class="p-4">

                            <h3 class="text-lg font-medium text-charcoal">TV Stand</h3>

                            <p class="text-oak-brown font-bold">$299</p>

                            <p class="text-sm text-gray-600">In Stock</p>

                            <a href="/product/tv-stand" class="mt-2 inline-block bg-oak-brown hover:bg-dark-oak text-off-white px-4 py-2 rounded-md text-sm">View Details</a>

                        </div>

                    </div>

                </div>

                <!-- Pagination -->

                <div class="mt-8 flex justify-center">

                    <nav class="flex items-center space-x-2">

                        <a href="#" class="px-3 py-2 border border-gray-300 rounded-md text-sm">Previous</a>

                        <a href="#" class="px-3 py-2 bg-oak-brown text-off-white rounded-md text-sm">1</a>

                        <a href="#" class="px-3 py-2 border border-gray-300 rounded-md text-sm">2</a>

                        <a href="#" class="px-3 py-2 border border-gray-300 rounded-md text-sm">Next</a>

                    </nav>

                </div>

            </div>

        </div>

    </div>

    <!-- Footer -->

    <footer class="bg-charcoal text-off-white py-8">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">

                <div>

                    <h3 class="text-lg font-bold mb-4">Oak Furnitures</h3>

                    <p>Premium furniture for your home.</p>

                </div>

                <div>

                    <h3 class="text-lg font-bold mb-4">Quick Links</h3>

                    <ul class="space-y-2">

                        <li><a href="/" class="hover:text-oak-brown">Home</a></li>

                        <li><a href="/shop" class="hover:text-oak-brown">Shop</a></li>

                        <li><a href="/about" class="hover:text-oak-brown">About</a></li>

                        <li><a href="/contact" class="hover:text-oak-brown">Contact</a></li>

                    </ul>

                </div>

                <div>

                    <h3 class="text-lg font-bold mb-4">Categories</h3>

                    <ul class="space-y-2">

                        <li><a href="/category/beds" class="hover:text-oak-brown">Beds</a></li>

                        <li><a href="/category/sofas" class="hover:text-oak-brown">Sofas</a></li>

                        <li><a href="/category/dining-sets" class="hover:text-oak-brown">Dining Sets</a></li>

                        <li><a href="/category/tables" class="hover:text-oak-brown">Tables</a></li>

                        <li><a href="/category/tv-stands" class="hover:text-oak-brown">TV Stands</a></li>

                    </ul>

                </div>

                <div>

                    <h3 class="text-lg font-bold mb-4">Contact</h3>

                    <p>Email: info@oakfurnitures.com</p>

                    <p>Phone: +1 234 567 890</p>

                </div>

            </div>

            <div class="border-t border-gray-600 mt-8 pt-8 text-center">

                <p>&copy; 2023 Oak Furnitures. All rights reserved.</p>

            </div>

        </div>

    </footer>

</div>

</x-layouts.app>