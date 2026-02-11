<x-layouts.app>

<div class="min-h-screen bg-off-white">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            <!-- Product Gallery -->

            <div>

                @php
                    $images = $product->images;
                    $mainImage = $images->first();
                @endphp

                <img src="{{ $mainImage ? $mainImage->image_url : asset('images/placeholder.png') }}" alt="{{ $product->name }}" class="w-full h-96 object-cover rounded-md mb-4" id="main-image">

                <div class="grid grid-cols-4 gap-2">

                    @foreach($images as $img)

                        <img src="{{ $img->image_url }}" alt="{{ $product->name }}" class="w-full h-24 object-cover rounded-md cursor-pointer gallery-image" data-src="{{ $img->image_url }}">

                    @endforeach

                </div>

            </div>

            <!-- Product Details -->

            <div>

                <h1 class="text-3xl font-serif font-bold text-charcoal mb-4">{{ $product->name }}</h1>

                <p class="text-oak-brown font-bold text-2xl mb-4">KES {{ number_format($product->price) }}</p>

                <p class="text-gray-600 mb-4">{{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}</p>

                <p class="text-charcoal mb-6">{{ $product->description }}</p>

                @php
                    $phone = config('services.whatsapp.number');
                    $message = "Hello Canon Furnitures 👋\n\n"
                        ."I am interested in:\n\n"
                        ."🪑 Product: {$product->name}\n"
                        ."💰 Price: KES {$product->price}\n\n"
                        ."Please assist me with availability and delivery.";
                @endphp

                <a
                    href="https://wa.me/{{ $phone }}?text={{ urlencode($message) }}"
                    target="_blank"
                    class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-md flex items-center gap-2 mb-6"
                >
                    <i class="fa-brands fa-whatsapp text-xl"></i>
                    Order on WhatsApp
                </a>

            </div>

        </div>

        <!-- Related Products -->

        <div class="mt-16">

            <h2 class="text-2xl font-serif font-bold text-charcoal mb-8">Related Products</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

                @foreach($relatedProducts as $related)

                    @php
                        $relImage = $related->images()->first();
                    @endphp

                    <div class="bg-white rounded-md shadow-md overflow-hidden">

                        <img src="{{ $relImage ? $relImage->image_url : asset('images/placeholder.png') }}" alt="{{ $related->name }}" class="w-full h-48 object-cover">

                        <div class="p-4">

                            <h3 class="text-lg font-medium text-charcoal">{{ $related->name }}</h3>

                            <p class="text-oak-brown font-bold">KES {{ number_format($related->price) }}</p>

                            <a href="{{ route('product.show', $related->slug) }}" class="mt-2 inline-block bg-oak-brown hover:bg-dark-oak text-off-white px-4 py-2 rounded-md text-sm">View Details</a>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </div>

</div>

@include('layouts.footer')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mainImage = document.getElementById('main-image');
        const galleryImages = document.querySelectorAll('.gallery-image');

        galleryImages.forEach(img => {
            img.addEventListener('click', function() {
                mainImage.src = this.dataset.src;
            });
        });
    });
</script>

</x-layouts.app>
