<x-layouts.app>

<div class="min-h-screen bg-off-white">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            <!-- Product Carousel Gallery -->

            <div>

                @php
                    $images = $product->images;
                    $imageCount = $images->count();
                @endphp

                <div class="relative overflow-hidden rounded-md mb-4 bg-gray-100">
                    <!-- Carousel Container -->
                    <div class="relative w-full h-96 group">
                        <!-- Images -->
                        <div class="carousel-wrapper relative w-full h-full">
                            @if($imageCount > 0)
                                @foreach($images as $idx => $img)
                                    <img src="{{ $img->image_path }}" alt="{{ $product->name }}" class="carousel-image absolute w-full h-full object-cover rounded-md cursor-pointer transition-all duration-500 {{ $idx === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0' }}" data-index="{{ $idx }}" data-lightbox>
                                @endforeach
                            @else
                                <img src="{{ asset('images/placeholder.png') }}" alt="{{ $product->name }}" class="w-full h-full object-cover rounded-md" data-lightbox>
                            @endif
                        </div>

                        <!-- Navigation Controls (show only if multiple images) -->
                        @if($imageCount > 1)
                            <!-- Previous Button -->
                            <button class="carousel-prev absolute left-4 top-1/2 transform -translate-y-1/2 bg-white hover:bg-gray-200 text-charcoal px-3 py-2 rounded-full text-2xl font-bold transition opacity-0 group-hover:opacity-100 z-20">
                                &#10094;
                            </button>

                            <!-- Next Button -->
                            <button class="carousel-next absolute right-4 top-1/2 transform -translate-y-1/2 bg-white hover:bg-gray-200 text-charcoal px-3 py-2 rounded-full text-2xl font-bold transition opacity-0 group-hover:opacity-100 z-20">
                                &#10095;
                            </button>

                            <!-- Carousel Indicators -->
                            <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex gap-2 z-20">
                                @for($i = 0; $i < $imageCount; $i++)
                                    <button class="carousel-indicator w-3 h-3 rounded-full transition-all {{ $i === 0 ? 'bg-white w-8' : 'bg-gray-400 hover:bg-gray-300' }}" data-index="{{ $i }}"></button>
                                @endfor
                            </div>
                        @endif
                    </div>

                    <!-- Image Counter -->
                    @if($imageCount > 1)
                        <div class="absolute top-4 right-4 bg-black bg-opacity-60 text-white px-2 py-1 rounded text-sm z-20">
                            <span class="carousel-current">1</span>/<span class="carousel-total">{{ $imageCount }}</span>
                        </div>
                    @endif
                </div>

            </div>

            <!-- Product Details -->

            <div>

                <h1 class="text-3xl font-serif font-bold text-charcoal mb-4">{{ $product->name }}</h1>

                <p class="text-oak-brown font-bold text-2xl mb-4">KES {{ number_format($product->price, 2) }}</p>

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

                    <div class="bg-white rounded-md shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl hover:scale-105">

                        <img src="{{ $relImage && $relImage->image_path ? $relImage->image_path : asset('images/placeholder.png') }}" alt="{{ $related->name }}" class="w-full h-48 object-cover transition-transform duration-300 hover:scale-110">

                        <div class="p-4">

                            <h3 class="text-lg font-medium text-charcoal">{{ $related->name }}</h3>

                            <p class="text-oak-brown font-bold">KES {{ number_format($related->price, 2) }}</p>

                            <a href="{{ route('product.show', $related->slug) }}" class="mt-2 inline-block bg-oak-brown hover:bg-dark-oak text-off-white px-4 py-2 rounded-md text-sm">View Details</a>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </div>

</div>

@include('layouts.footer')

<!-- Lightbox Modal for Product Images -->
<div id="lightbox" class="fixed inset-0 bg-black bg-opacity-75 hidden justify-center items-center z-50 p-4">
    <div class="relative max-w-4xl max-h-[90vh] w-full">
        <img id="lightbox-image" src="" alt="" class="max-w-full max-h-[90vh] object-contain rounded-lg mx-auto">
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
        // Carousel functionality
        const carouselImages = document.querySelectorAll('.carousel-image');
        const carouselPrev = document.querySelector('.carousel-prev');
        const carouselNext = document.querySelector('.carousel-next');
        const carouselIndicators = document.querySelectorAll('.carousel-indicator');
        const carouselCurrent = document.querySelector('.carousel-current');
        let currentImageIndex = 0;
        const imageCount = carouselImages.length;

        function showImage(index) {
            // Update carousel
            carouselImages.forEach((img, i) => {
                img.classList.remove('opacity-100', 'z-10');
                img.classList.add('opacity-0', 'z-0');
            });
            carouselImages[index].classList.remove('opacity-0', 'z-0');
            carouselImages[index].classList.add('opacity-100', 'z-10');

            // Update indicators
            carouselIndicators.forEach((dot, i) => {
                if (i === index) {
                    dot.classList.remove('bg-gray-400', 'hover:bg-gray-300', 'w-3');
                    dot.classList.add('bg-white', 'w-8');
                } else {
                    dot.classList.remove('bg-white', 'w-8');
                    dot.classList.add('bg-gray-400', 'hover:bg-gray-300', 'w-3');
                }
            });

            // Update counter
            if (carouselCurrent) {
                carouselCurrent.textContent = index + 1;
            }

            currentImageIndex = index;
        }

        // Carousel navigation
        if (carouselPrev) {
            carouselPrev.addEventListener('click', function(e) {
                e.stopPropagation();
                currentImageIndex = (currentImageIndex - 1 + imageCount) % imageCount;
                showImage(currentImageIndex);
            });
        }

        if (carouselNext) {
            carouselNext.addEventListener('click', function(e) {
                e.stopPropagation();
                currentImageIndex = (currentImageIndex + 1) % imageCount;
                showImage(currentImageIndex);
            });
        }

        // Indicator click
        carouselIndicators.forEach((indicator, index) => {
            indicator.addEventListener('click', function(e) {
                e.stopPropagation();
                showImage(index);
            });
        });

        // Lightbox functionality
        const lightbox = document.getElementById('lightbox');
        const lightboxImage = document.getElementById('lightbox-image');
        const lightboxClose = document.getElementById('lightbox-close');
        const lightboxPrev = document.getElementById('lightbox-prev');
        const lightboxNext = document.getElementById('lightbox-next');
        const lightboxImages = document.querySelectorAll('[data-lightbox]');
        let allImages = [];
        let lightboxCurrentIndex = 0;

        // Collect all carousel images
        lightboxImages.forEach(img => {
            if (img.src) {
                allImages.push(img.src);
            }
        });

        // Open lightbox on image click
        lightboxImages.forEach((img, index) => {
            img.addEventListener('click', function() {
                lightboxCurrentIndex = currentImageIndex;
                lightboxImage.src = allImages[lightboxCurrentIndex];
                lightbox.style.display = 'flex';
            });
        });

        // Close lightbox
        if (lightboxClose) {
            lightboxClose.addEventListener('click', function() {
                lightbox.style.display = 'none';
            });
        }

        if (lightbox) {
            lightbox.addEventListener('click', function(e) {
                if (e.target === lightbox) {
                    lightbox.style.display = 'none';
                }
            });
        }

        // Lightbox navigation
        if (lightboxPrev) {
            lightboxPrev.addEventListener('click', function(e) {
                e.stopPropagation();
                lightboxCurrentIndex = (lightboxCurrentIndex - 1 + allImages.length) % allImages.length;
                lightboxImage.src = allImages[lightboxCurrentIndex];
            });
        }

        if (lightboxNext) {
            lightboxNext.addEventListener('click', function(e) {
                e.stopPropagation();
                lightboxCurrentIndex = (lightboxCurrentIndex + 1) % allImages.length;
                lightboxImage.src = allImages[lightboxCurrentIndex];
            });
        }

        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (lightbox && lightbox.style.display === 'flex') {
                if (e.key === 'ArrowLeft') lightboxPrev.click();
                if (e.key === 'ArrowRight') lightboxNext.click();
                if (e.key === 'Escape') lightboxClose.click();
            }
        });

        // Keyboard navigation for carousel
        document.addEventListener('keydown', function(e) {
            if (lightbox && lightbox.style.display !== 'flex') {
                if (e.key === 'ArrowLeft' && carouselPrev) carouselPrev.click();
                if (e.key === 'ArrowRight' && carouselNext) carouselNext.click();
            }
        });
    });
</script>

</x-layouts.app>
