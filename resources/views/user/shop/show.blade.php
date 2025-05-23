@extends('layouts.main')

@section('title', $product->name . ' - Nataliving Furniture')

@section('content')
    <div class="bg-gray-50 min-h-screen pb-16">
        <!-- Breadcrumb -->
        <div class="bg-white border-b">
            <div class="container mx-auto px-4 py-3">
                <div class="flex items-center text-sm text-gray-500 flex-wrap">
                    <a href="{{ route('home') }}" class="hover:text-nataliving-leaf transition-colors">Beranda</a>
                    <span class="mx-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </span>
                    <a href="{{ route('shop.index') }}" class="hover:text-nataliving-leaf transition-colors">Produk</a>
                    <span class="mx-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </span>
                    <span class="font-medium text-gray-700">{{ $product->name }}</span>
                </div>
            </div>
        </div>

        <div class="container mx-auto px-4 py-8">
            <!-- Main Product Section -->
            <div class="bg-white shadow-lg rounded-3xl overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-0">
                    <!-- Product Gallery Section -->
                    <div id="controls-carousel" class="relative w-full" data-carousel="static">
                        <div class="relative h-[400px] md:h-[500px] overflow-hidden rounded-2xl shadow-lg">
                            @foreach ($product->images as $index => $image)
                                <div class="{{ $loop->first ? 'block' : 'hidden' }} duration-700 ease-in-out"
                                    data-carousel-item="{{ $loop->first ? 'active' : '' }}">
                                    <img src="{{ asset('storage/' . $image->image_url) }}"
                                        class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                        alt="{{ $product->name }} - Image {{ $index + 1 }}">
                                </div>
                            @endforeach
                        </div>

                        @if ($product->images->count() > 1)
                            <!-- Prev Button -->
                            <button type="button"
                                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                data-carousel-prev>
                                <span
                                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" fill="none"
                                        viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M5 1 1 5l4 4" />
                                    </svg>
                                    <span class="sr-only">Previous</span>
                                </span>
                            </button>

                            <!-- Next Button -->
                            <button type="button"
                                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                data-carousel-next>
                                <span
                                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <svg class="w-4 h-4 text-white dark:text-gray-800" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 9 4-4-4-4" />
                                    </svg>
                                    <span class="sr-only">Next</span>
                                </span>
                            </button>
                        @endif
                    </div>
                    <!-- Product Details Section -->
                    <div class="p-8">
                        <!-- Product Status & Category -->
                        <div class="flex flex-wrap gap-2 mb-4">
                            @if (isset($product->categories))
                                <span
                                    class="inline-flex items-center bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-1 rounded-full">
                                    {{ $product->categories->first()->name }}
                                </span>
                            @endif
                        </div>

                        <!-- Product Title -->
                        <h1 class="text-3xl font-bold text-gray-900 mb-2 leading-tight">{{ $product->name }}</h1>

                        <!-- Product Price -->
                        <div class="mb-6">
                            <div class="flex items-baseline gap-3">
                                <span class="text-3xl font-bold text-nataliving-leaf">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </span>
                                @if (isset($product->original_price) && $product->original_price > $product->price)
                                    <span class="text-lg text-gray-400 line-through">
                                        Rp {{ number_format($product->original_price, 0, ',', '.') }}
                                    </span>
                                    <span class="bg-red-100 text-red-800 text-xs font-medium px-2 py-1 rounded">
                                        Hemat
                                        {{ round((($product->original_price - $product->price) / $product->original_price) * 100) }}%
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="space-y-4">
                            <a href="https://wa.me/6281234567890?text=Halo, saya tertarik dengan produk {{ $product->name }}"
                                target="_blank"
                                class="flex items-center justify-center w-full py-4 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-200 transform hover:-translate-y-0.5">
                                <span class="material-icons mr-2">chat</span>
                                Hubungi via WhatsApp
                            </a>

                            <div class="grid grid-cols-2 gap-4">
                                <button
                                    class="flex items-center justify-center py-3 border-2 border-nataliving-leaf text-nataliving-leaf hover:bg-nataliving-leaf hover:text-white font-medium rounded-xl transition-colors duration-200">
                                    <span class="material-icons mr-2">favorite_border</span>
                                    Simpan
                                </button>
                                <button
                                    class="flex items-center justify-center py-3 border-2 border-gray-300 text-gray-700 hover:bg-gray-50 font-medium rounded-xl transition-colors duration-200">
                                    <span class="material-icons mr-2">share</span>
                                    Bagikan
                                </button>
                            </div>
                        </div>

                        <!-- Additional Info -->
                        <div class="mt-8 pt-6 border-t border-gray-200">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="flex items-center gap-2 text-gray-600">
                                    <span class="material-icons text-nataliving-leaf">local_shipping</span>
                                    <span>Pengiriman ke seluruh Indonesia</span>
                                </div>
                                <div class="flex items-center gap-2 text-gray-600">
                                    <span class="material-icons text-nataliving-leaf">verified</span>
                                    <span>Garansi resmi 1 tahun</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Tabs -->
            <div class="mt-10 bg-white shadow-lg rounded-3xl overflow-hidden">
                <div class="border-b border-gray-200">
                    <div class="flex overflow-x-auto">
                        <button
                            class="tab-button px-6 py-4 font-medium text-nataliving-leaf border-b-2 border-nataliving-leaf whitespace-nowrap"
                            data-tab="description">
                            Deskripsi Detail
                        </button>
                        <button class="tab-button px-6 py-4 font-medium text-gray-500 hover:text-gray-700 whitespace-nowrap"
                            data-tab="shipping">
                            Pengiriman & Garansi
                        </button>
                    </div>
                </div>

                <div class="p-6">
                    <!-- Description Tab -->
                    <div id="description" class="tab-content">
                        <div class="prose max-w-none text-gray-600">
                            {!! nl2br(e($product->description)) !!}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Related Products -->
            <div class="mt-12">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Produk Terkait</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($relatedProducts as $item)
                        <div
                            class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                            <div class="relative">
                                <a href="{{ route('products.show', $item->id) }}">
                                    <img src="{{ $item->images->first() ? asset('storage/' . $item->images->first()->image_url) : asset('img/placeholder.jpg') }}"
                                        alt="{{ $item->name }}" class="w-full h-48 object-cover">
                                </a>
                                <button
                                    class="absolute top-3 right-3 w-8 h-8 bg-white rounded-full flex items-center justify-center shadow-md hover:bg-gray-50 transition">
                                    <span class="material-icons text-gray-600 text-sm">favorite_border</span>
                                </button>
                            </div>
                            <div class="p-4">
                                <h3 class="font-semibold text-gray-800 mb-2 line-clamp-2">
                                    <a href="{{ route('products.show', $item->id) }}" class="hover:text-nataliving-leaf">
                                        {{ $item->name }}
                                    </a>
                                </h3>
                                <div class="flex items-center mb-2">
                                    <div class="flex text-yellow-400">
                                        @for ($j = 1; $j <= 5; $j++)
                                            <span class="material-icons text-xs">
                                                {{ $j <= 4 ? 'star' : 'star_border' }}
                                            </span>
                                        @endfor
                                    </div>
                                    <span class="text-xs text-gray-500 ml-1">(18)</span>
                                </div>
                                <div class="font-bold text-gray-800">
                                    Rp {{ number_format($item->price, 0, ',', '.') }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

        <!-- Image Zoom Modal -->
        <div id="zoomModal" class="fixed inset-0 bg-black bg-opacity-90 z-50 hidden  items-center justify-center p-4">
            <button id="closeZoom" class="absolute top-4 right-4 text-white hover:text-gray-300">
                <span class="material-icons text-3xl">close</span>
            </button>
            <img id="zoomedImage" src="/placeholder.svg" alt="Zoomed Image"
                class="max-w-full max-h-[90vh] object-contain">
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Image Slider Functionality
            const slides = document.querySelectorAll('.slide');
            const thumbs = document.querySelectorAll('.thumb');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            const autoplayBtn = document.getElementById('autoplayBtn');
            const autoplayIcon = document.getElementById('autoplayIcon');
            const currentSlideSpan = document.getElementById('current-slide');
            const zoomBtn = document.getElementById('zoomBtn');
            const zoomModal = document.getElementById('zoomModal');
            const zoomedImage = document.getElementById('zoomedImage');
            const closeZoom = document.getElementById('closeZoom');

            let current = 0;
            let isAutoplay = true;
            let autoplayInterval;

            function showSlide(index) {
                // Update slides
                slides.forEach((slide, i) => {
                    slide.classList.toggle('opacity-100', i === index);
                    slide.classList.toggle('z-10', i === index);
                    slide.classList.toggle('opacity-0', i !== index);
                    slide.classList.toggle('z-0', i !== index);
                });

                // Update thumbnails
                thumbs.forEach((thumb, i) => {
                    thumb.classList.toggle('ring-2', i === index);
                    thumb.classList.toggle('ring-nataliving-leaf', i === index);
                    thumb.classList.toggle('ring-1', i !== index);
                    thumb.classList.toggle('ring-gray-200', i !== index);
                });

                // Update counter if it exists
                if (currentSlideSpan) {
                    currentSlideSpan.textContent = index + 1;
                }

                current = index;
            }

            function nextSlide() {
                let next = (current + 1) % slides.length;
                showSlide(next);
            }

            function prevSlide() {
                let prev = (current - 1 + slides.length) % slides.length;
                showSlide(prev);
            }

            function startAutoplay() {
                if (slides.length > 1) {
                    autoplayInterval = setInterval(nextSlide, 5000);
                    isAutoplay = true;
                    if (autoplayIcon) {
                        autoplayIcon.textContent = 'pause';
                    }
                }
            }

            function stopAutoplay() {
                clearInterval(autoplayInterval);
                isAutoplay = false;
                if (autoplayIcon) {
                    autoplayIcon.textContent = 'play_arrow';
                }
            }

            // Initialize autoplay
            if (slides.length > 1) {
                startAutoplay();
            }

            // Event Listeners
            if (prevBtn) {
                prevBtn.addEventListener('click', () => {
                    prevSlide();
                    stopAutoplay();
                });
            }

            if (nextBtn) {
                nextBtn.addEventListener('click', () => {
                    nextSlide();
                    stopAutoplay();
                });
            }

            if (autoplayBtn) {
                autoplayBtn.addEventListener('click', () => {
                    if (isAutoplay) {
                        stopAutoplay();
                    } else {
                        startAutoplay();
                    }
                });
            }

            // Thumbnail clicks
            thumbs.forEach((thumb, i) => {
                thumb.addEventListener('click', () => {
                    showSlide(i);
                    stopAutoplay();
                });
            });

            // Keyboard navigation
            document.addEventListener('keydown', (e) => {
                if (e.key === 'ArrowLeft') {
                    prevSlide();
                    stopAutoplay();
                } else if (e.key === 'ArrowRight') {
                    nextSlide();
                    stopAutoplay();
                }
            });

            // Touch/swipe support
            const sliderContainer = document.getElementById('sliderContainer');
            let startX = 0;
            let endX = 0;

            if (sliderContainer) {
                sliderContainer.addEventListener('touchstart', (e) => {
                    startX = e.touches[0].clientX;
                });

                sliderContainer.addEventListener('touchend', (e) => {
                    endX = e.changedTouches[0].clientX;
                    const diff = startX - endX;

                    if (Math.abs(diff) > 50) {
                        if (diff > 0) {
                            nextSlide();
                        } else {
                            prevSlide();
                        }
                        stopAutoplay();
                    }
                });
            }

            // Zoom functionality
            if (zoomBtn) {
                zoomBtn.addEventListener('click', () => {
                    const currentImage = slides[current].querySelector('img');
                    zoomedImage.src = currentImage.src;
                    zoomModal.classList.remove('hidden');
                    document.body.style.overflow = 'hidden';
                });
            }

            if (closeZoom) {
                closeZoom.addEventListener('click', () => {
                    zoomModal.classList.add('hidden');
                    document.body.style.overflow = '';
                });
            }

            // Close zoom with Escape key
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && !zoomModal.classList.contains('hidden')) {
                    zoomModal.classList.add('hidden');
                    document.body.style.overflow = '';
                }
            });

            // Tab functionality
            const tabButtons = document.querySelectorAll('.tab-button');
            const tabContents = document.querySelectorAll('.tab-content');

            tabButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const tabId = button.getAttribute('data-tab');

                    // Update active tab button
                    tabButtons.forEach(btn => {
                        btn.classList.remove('text-nataliving-leaf', 'border-b-2',
                            'border-nataliving-leaf');
                        btn.classList.add('text-gray-500');
                    });
                    button.classList.remove('text-gray-500');
                    button.classList.add('text-nataliving-leaf', 'border-b-2',
                        'border-nataliving-leaf');

                    // Show active tab content
                    tabContents.forEach(content => {
                        content.classList.add('hidden');
                    });
                    document.getElementById(tabId).classList.remove('hidden');
                });
            });
        });
    </script>

    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
@endsection
