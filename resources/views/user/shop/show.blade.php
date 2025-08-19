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

            @include('partials.main-product')
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
                            {!! $product->description !!}
                        </div </div>

                        <!-- Reviews Tab -->
                        <div id="reviews" class="tab-content hidden">
                            <div class="mb-8">
                                <div class="flex items-center gap-4">
                                    <div class="flex-shrink-0">
                                        <div class="flex flex-col items-center">
                                            <div class="text-5xl font-bold text-gray-900">4.8</div>
                                            <div class="flex text-yellow-400 mb-1">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <span
                                                        class="material-icons text-sm">{{ $i <= 4 ? 'star' : 'star_half' }}</span>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow">
                                        <div class="space-y-2">
                                            <div class="flex items-center">
                                                <span class="text-sm w-12">5 ★</span>
                                                <div class="flex-grow h-2 bg-gray-200 rounded-full mx-2">
                                                    <div class="h-2 bg-yellow-400 rounded-full" style="width: 85%"></div>
                                                </div>
                                                <span class="text-sm w-8 text-right">85%</span>
                                            </div>
                                            <div class="flex items-center">
                                                <span class="text-sm w-12">4 ★</span>
                                                <div class="flex-grow h-2 bg-gray-200 rounded-full mx-2">
                                                    <div class="h-2 bg-yellow-400 rounded-full" style="width: 10%"></div>
                                                </div>
                                                <span class="text-sm w-8 text-right">10%</span>
                                            </div>
                                            <div class="flex items-center">
                                                <span class="text-sm w-12">3 ★</span>
                                                <div class="flex-grow h-2 bg-gray-200 rounded-full mx-2">
                                                    <div class="h-2 bg-yellow-400 rounded-full" style="width: 5%"></div>
                                                </div>
                                                <span class="text-sm w-8 text-right">5%</span>
                                            </div>
                                            <div class="flex items-center">
                                                <span class="text-sm w-12">2 ★</span>
                                                <div class="flex-grow h-2 bg-gray-200 rounded-full mx-2">
                                                    <div class="h-2 bg-yellow-400 rounded-full" style="width: 0%"></div>
                                                </div>
                                                <span class="text-sm w-8 text-right">0%</span>
                                            </div>
                                            <div class="flex items-center">
                                                <span class="text-sm w-12">1 ★</span>
                                                <div class="flex-grow h-2 bg-gray-200 rounded-full mx-2">
                                                    <div class="h-2 bg-yellow-400 rounded-full" style="width: 0%"></div>
                                                </div>
                                                <span class="text-sm w-8 text-right">0%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-6">
                                <!-- Review Item -->
                                <div class="border-b border-gray-200 pb-6">
                                    <div class="flex items-start gap-4">
                                        <div
                                            class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center text-gray-500">
                                            <span class="material-icons">person</span>
                                        </div>
                                        <div class="flex-1">
                                            <div class="flex items-center gap-2 mb-1">
                                                <h4 class="font-semibold">Budi Santoso</h4>
                                                <div class="flex text-yellow-400">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <span class="material-icons text-sm">star</span>
                                                    @endfor
                                                </div>
                                            </div>
                                            <div class="text-xs text-gray-500 mb-2">12 Mei 2023</div>
                                            <p class="text-gray-600 mb-2">Kualitas furniture sangat bagus, sesuai dengan
                                                deskripsi. Pengiriman cepat dan packaging aman. Sangat puas dengan pembelian
                                                ini!</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Review Item -->
                                <div class="border-b border-gray-200 pb-6">
                                    <div class="flex items-start gap-4">
                                        <div
                                            class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center text-gray-500">
                                            <span class="material-icons">person</span>
                                        </div>
                                        <div class="flex-1">
                                            <div class="flex items-center gap-2 mb-1">
                                                <h4 class="font-semibold">Siti Rahayu</h4>
                                                <div class="flex text-yellow-400">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <span
                                                            class="material-icons text-sm">{{ $i <= 4 ? 'star' : 'star_border' }}</span>
                                                    @endfor
                                                </div>
                                            </div>
                                            <div class="text-xs text-gray-500 mb-2">28 April 2023</div>
                                            <p class="text-gray-600 mb-2">Desainnya sangat elegan dan cocok dengan interior
                                                rumah saya. Kayu jatinya berkualitas tinggi. Hanya saja pengirimannya agak
                                                lama.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- More Reviews Button -->
                                <div class="text-center">
                                    <button
                                        class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                                        Lihat Semua Ulasan
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Shipping Tab -->
                        <div id="shipping" class="tab-content hidden">
                            <div class="space-y-6">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Informasi Pengiriman</h3>

                                    <div class="mt-4 space-y-2">
                                        <div class="flex items-center gap-3">
                                            <span class="material-icons text-nataliving-leaf">local_shipping</span>
                                            <span>Gratis ongkir</span>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Informasi Garansi</h3>

                                    <div class="mt-4 space-y-2">
                                        <div class="flex items-center gap-3">
                                            <span class="material-icons text-nataliving-leaf">check_circle</span>
                                            <span>Garansi mencakup kerusakan struktural</span>
                                        </div>
                                        <div class="flex items-center gap-3">
                                            <span class="material-icons text-nataliving-leaf">check_circle</span>
                                            <span>Layanan perbaikan gratis</span>
                                        </div>
                                        <div class="flex items-center gap-3">
                                            <span class="material-icons text-nataliving-leaf">check_circle</span>
                                            <span>Penggantian produk untuk kerusakan parah</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('partials.related-product')
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Carousel functionality
                let currentSlide = 0;
                let isAutoplay = true;
                let autoplayInterval;

                const slides = document.querySelectorAll('[data-carousel-item]');
                const thumbnails = document.querySelectorAll('.thumb');
                const dots = document.querySelectorAll('[data-carousel-slide-to]');
                const prevBtn = document.querySelector('[data-carousel-prev]');
                const nextBtn = document.querySelector('[data-carousel-next]');
                const autoplayBtn = document.getElementById('autoplayBtn');
                const autoplayIcon = document.getElementById('autoplayIcon');
                const zoomBtn = document.getElementById('zoomBtn');
                const zoomModal = document.getElementById('zoomModal');
                const zoomedImage = document.getElementById('zoomedImage');
                const closeZoom = document.getElementById('closeZoom');

                function showSlide(index) {
                    // Hide all slides
                    slides.forEach((slide, i) => {
                        slide.classList.add('hidden');
                        if (i === index) {
                            slide.classList.remove('hidden');
                        }
                    });

                    // Update dots
                    dots.forEach((dot, i) => {
                        dot.classList.remove('bg-white');
                        dot.classList.add('bg-white/50');
                        if (i === index) {
                            dot.classList.remove('bg-white/50');
                            dot.classList.add('bg-white');
                            dot.setAttribute('aria-current', 'true');
                        } else {
                            dot.setAttribute('aria-current', 'false');
                        }
                    });

                    // Update thumbnails
                    thumbnails.forEach((thumb, i) => {
                        thumb.classList.remove('ring-2', 'ring-nataliving-leaf');
                        thumb.classList.add('ring-1', 'ring-gray-200');
                        if (i === index) {
                            thumb.classList.remove('ring-1', 'ring-gray-200');
                            thumb.classList.add('ring-2', 'ring-nataliving-leaf');
                        }
                    });

                    // Update counter
                    const counters = document.querySelectorAll('.current-slide');
                    counters.forEach(counter => {
                        counter.textContent = index + 1;
                    });

                    currentSlide = index;
                }

                function nextSlide() {
                    const next = (currentSlide + 1) % slides.length;
                    showSlide(next);
                }

                function prevSlide() {
                    const prev = (currentSlide - 1 + slides.length) % slides.length;
                    showSlide(prev);
                }

                function startAutoplay() {
                    if (slides.length > 1) {
                        autoplayInterval = setInterval(nextSlide, 4000);
                        isAutoplay = true;
                        if (autoplayIcon) autoplayIcon.textContent = 'pause';
                    }
                }

                function stopAutoplay() {
                    clearInterval(autoplayInterval);
                    isAutoplay = false;
                    if (autoplayIcon) autoplayIcon.textContent = 'play_arrow';
                }

                // Event listeners
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

                // Dot navigation
                dots.forEach((dot, index) => {
                    dot.addEventListener('click', () => {
                        showSlide(index);
                        stopAutoplay();
                    });
                });

                // Thumbnail clicks
                thumbnails.forEach((thumb, index) => {
                    thumb.addEventListener('click', () => {
                        showSlide(index);
                        stopAutoplay();
                    });
                });

                // Touch/swipe support
                const carousel = document.getElementById('default-carousel');
                let startX = 0;
                let endX = 0;

                if (carousel) {
                    carousel.addEventListener('touchstart', (e) => {
                        startX = e.touches[0].clientX;
                    });

                    carousel.addEventListener('touchend', (e) => {
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

                // Keyboard navigation
                document.addEventListener('keydown', (e) => {
                    if (e.key === 'ArrowLeft') {
                        prevSlide();
                        stopAutoplay();
                    } else if (e.key === 'ArrowRight') {
                        nextSlide();
                        stopAutoplay();
                    } else if (e.key === 'Escape' && zoomModal && !zoomModal.classList.contains('hidden')) {
                        closeZoomModal();
                    }
                });

                // Zoom functionality
                function openZoomModal() {
                    if (zoomModal && zoomedImage) {
                        const currentImage = slides[currentSlide].querySelector('img');
                        zoomedImage.src = currentImage.src;
                        zoomModal.classList.remove('hidden');
                        zoomModal.classList.add('flex');
                        document.body.style.overflow = 'hidden';
                    }
                }

                function closeZoomModal() {
                    if (zoomModal) {
                        zoomModal.classList.add('hidden');
                        zoomModal.classList.remove('flex');
                        document.body.style.overflow = '';
                    }
                }

                if (zoomBtn) {
                    zoomBtn.addEventListener('click', openZoomModal);
                }

                if (closeZoom) {
                    closeZoom.addEventListener('click', closeZoomModal);
                }

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
                        const activeTab = document.getElementById(tabId);
                        if (activeTab) {
                            activeTab.classList.remove('hidden');
                        }
                    });
                });

                // Initialize
                if (slides.length > 1) {
                    startAutoplay();
                }
                showSlide(0);
            });
            document.addEventListener('DOMContentLoaded', function() {
                const copyBtn = document.getElementById('copyLinkBtn');
                const statusText = document.getElementById('copyStatus');

                if (copyBtn) {
                    copyBtn.addEventListener('click', async () => {
                        try {
                            await navigator.clipboard.writeText(window.location.href);
                            statusText.classList.remove('hidden');

                            setTimeout(() => {
                                statusText.classList.add('hidden');
                            }, 2000);
                        } catch (err) {
                            alert('Gagal menyalin link.');
                            console.error(err);
                        }
                    });
                }
            });
        </script>

        <style>
            .line-clamp-2 {
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            .scrollbar-hide {
                -ms-overflow-style: none;
                scrollbar-width: none;
            }

            .scrollbar-hide::-webkit-scrollbar {
                display: none;
            }

            /* Smooth transitions for carousel */
            [data-carousel-item] {
                transition: opacity 0.7s ease-in-out;
            }

            /* Mobile optimizations */
            @media (max-width: 768px) {
                .thumb {
                    min-width: 4rem;
                }
            }
        </style>
    @endsection
