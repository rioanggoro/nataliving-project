            <!-- Main Product Section -->
            <div class="bg-white shadow-lg rounded-3xl overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-0">
                    <!-- Product Gallery Section -->
                    <div class="relative bg-gradient-to-br from-gray-50 to-gray-100 p-4 md:p-8">
                        <!-- Main Image Container -->
                        <div class="relative mb-6">
                            <div id="main-carousel" class="relative w-full max-w-md mx-auto">
                                <!-- Main Image Display -->
                                <div
                                    class="relative aspect-[4/5] w-full bg-white rounded-2xl shadow-lg overflow-hidden group">
                                    @foreach ($product->images as $index => $image)
                                        <div class="carousel-slide absolute inset-0 w-full h-full transition-opacity duration-500 {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}"
                                            data-slide="{{ $index }}">
                                            <img src="{{ asset('storage/' . $image->image_url) }}"
                                                class="w-full h-full object-contain p-4"
                                                alt="{{ $product->name }} - Image {{ $index + 1 }}">
                                        </div>
                                    @endforeach

                                    <!-- Image Counter Badge -->
                                    @if ($product->images->count() > 1)
                                        <div
                                            class="absolute top-4 right-4 bg-black/70 text-white text-xs px-3 py-1.5 rounded-full backdrop-blur-sm">
                                            <span id="current-counter">1</span> / {{ $product->images->count() }}
                                        </div>
                                    @endif

                                    <!-- Navigation Arrows -->
                                    @if ($product->images->count() > 1)
                                        <button type="button" id="prev-btn"
                                            class="absolute left-4 top-1/2 -translate-y-1/2 w-10 h-10 bg-white/90 hover:bg-white rounded-full shadow-lg flex items-center justify-center transition-all duration-200 opacity-0 group-hover:opacity-100">
                                            <span class="material-icons text-gray-700">chevron_left</span>
                                        </button>
                                        <button type="button" id="next-btn"
                                            class="absolute right-4 top-1/2 -translate-y-1/2 w-10 h-10 bg-white/90 hover:bg-white rounded-full shadow-lg flex items-center justify-center transition-all duration-200 opacity-0 group-hover:opacity-100">
                                            <span class="material-icons text-gray-700">chevron_right</span>
                                        </button>
                                    @endif

                                    <!-- Zoom Button -->
                                    <button type="button" id="zoom-btn"
                                        class="absolute top-4 left-4 w-10 h-10 bg-white/90 hover:bg-white rounded-full shadow-lg flex items-center justify-center transition-all duration-200 opacity-0 group-hover:opacity-100">
                                        <span class="material-icons text-gray-700">zoom_in</span>
                                    </button>
                                </div>

                                <!-- Dot Indicators -->
                                @if ($product->images->count() > 1)
                                    <div class="flex justify-center mt-4 space-x-2">
                                        @foreach ($product->images as $index => $image)
                                            <button type="button"
                                                class="dot-indicator w-2.5 h-2.5 rounded-full transition-all duration-200 {{ $index === 0 ? 'bg-nataliving-leaf' : 'bg-gray-300 hover:bg-gray-400' }}"
                                                data-slide="{{ $index }}">
                                            </button>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Thumbnail Gallery -->
                        @if ($product->images->count() > 1)
                            <div class="flex justify-center">
                                <div class="flex space-x-3 overflow-x-auto pb-2 max-w-md scrollbar-hide">
                                    @foreach ($product->images as $index => $image)
                                        <button type="button"
                                            class="thumbnail-btn flex-shrink-0 relative group {{ $index === 0 ? 'ring-2 ring-nataliving-leaf' : 'ring-1 ring-gray-200' }} rounded-lg overflow-hidden transition-all duration-200 hover:ring-2 hover:ring-nataliving-leaf"
                                            data-slide="{{ $index }}">
                                            <div class="aspect-[4/5] w-16 bg-white">
                                                <img src="{{ asset('storage/' . $image->image_url) }}"
                                                    class="w-full h-full object-contain p-1"
                                                    alt="Thumbnail {{ $index + 1 }}">
                                            </div>
                                            <div
                                                class="absolute inset-0 bg-black/0 group-hover:bg-black/5 transition-colors duration-200">
                                            </div>
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Product Details Section -->
                    <div class="p-4 md:p-8">
                        <!-- Product Status & Category -->
                        <div class="flex flex-wrap gap-2 mb-4">
                            @if (isset($product->categories))
                                <span
                                    class="inline-flex items-center bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-1 rounded-full">
                                    {{ $product->categories->first()->name }}
                                </span>
                            @endif
                            <span
                                class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-1 rounded-full">
                                Preorder :
                                {{ $product->preorder ?? 'Tidak diketahui' }} hari
                            </span>

                        </div>
                        <p class="text-xs md:text-sm text-gray-500 mb-1">
                            <span class="font-semibold text-gray-700">Kategori:</span>
                            {{ $product->category ? $product->category->name : 'Tidak diketahui' }}
                        </p>
                        <p class="text-xs md:text-sm text-gray-500 mb-1">
                            <span class="font-semibold text-gray-700">SKU:</span>
                            {{ $product->skus->first()->sku ?? 'N/A' }}
                        </p>
                        <!-- Product Title -->
                        <h1 class="text-xl md:text-3xl font-bold text-gray-900 mb-3 md:mb-2 leading-tight">
                            {{ $product->name }}</h1>

                        <!-- Product Price -->
                        <div class="mb-6">
                            <div class="flex items-baseline gap-2 md:gap-3 flex-wrap">
                                <span class="text-2xl md:text-3xl font-bold text-nataliving-leaf">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </span>
                                @if (isset($product->original_price) && $product->original_price > $product->price)
                                    <span class="text-base md:text-lg text-gray-400 line-through">
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
                        <div class="grid grid-cols-2 gap-3 md:gap-4">
                            <!-- Hubungi via WhatsApp -->
                            @php
                                // 1. Siapkan semua bagian pesan tanpa image_url
                                $productName = '*' . $product->name . '*'; // Tambahkan bintang untuk teks tebal
                                $productUrl = route('shop.show', $product->slug);
                                $message = "Halo,\n\nSaya ingin bertanya tentang produk {$productName}\n{$productUrl}\n\nApakah bisa dibantu?";
                                $whatsappUrl = 'https://wa.me/62819870789?text=' . urlencode($message);
                            @endphp {{-- 3. Gunakan URL yang sudah jadi di sini --}}
                            <a href="{{ $whatsappUrl }}" target="_blank"
                                class="flex items-center justify-center gap-2 py-2.5 md:py-3 border-2 border-nataliving-leaf text-nataliving-leaf hover:bg-nataliving-leaf hover:text-white font-semibold rounded-xl transition-all duration-200 shadow-sm hover:shadow-md">
                                <span class="material-icons text-lg md:text-xl">chat</span>
                                <span class="text-sm md:text-base">WhatsApp</span>
                            </a>

                            <!-- Bagikan -->
                            <button type="button" id="copyLinkBtn"
                                class="flex items-center justify-center gap-2 py-2.5 md:py-3 border-2 border-gray-300 text-gray-700 hover:bg-gray-100 hover:border-gray-400 font-medium rounded-xl transition duration-200">
                                <span class="material-icons text-lg md:text-xl">share</span>
                                <span class="text-sm md:text-base">Bagikan Produk</span>
                            </button>
                            <span id="copyStatus" class="ml-3 text-sm text-green-600 hidden">✅ Link disalin!</span>
                        </div> <!-- Additional Info -->
                        <div class="mt-6 md:mt-8 pt-4 md:pt-6 border-t border-gray-200">
                            <div class="grid grid-cols-1 gap-3 md:gap-4">
                                <div class="flex items-center gap-2 text-gray-600 text-sm md:text-base">
                                    <span
                                        class="material-icons text-nataliving-leaf text-lg md:text-xl">local_shipping</span>
                                    <span>Pengiriman ke seluruh Indonesia</span>
                                </div>
                                <div class="flex items-center gap-2 text-gray-600 text-sm md:text-base">
                                    <span class="material-icons text-nataliving-leaf text-lg md:text-xl">verified</span>
                                    <span>Garansi produk</span>
                                </div>
                            </div>
                        </div>

                        <!-- Carousel & Zoom Script -->
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const slides = document.querySelectorAll('.carousel-slide');
                                const dots = document.querySelectorAll('.dot-indicator');
                                const thumbnails = document.querySelectorAll('.thumbnail-btn');
                                const prevBtn = document.getElementById('prev-btn');
                                const nextBtn = document.getElementById('next-btn');
                                const counter = document.getElementById('current-counter');
                                const zoomBtn = document.getElementById('zoom-btn');
                                let current = 0;

                                function showSlide(idx) {
                                    slides.forEach((slide, i) => {
                                        slide.classList.toggle('opacity-100', i === idx);
                                        slide.classList.toggle('opacity-0', i !== idx);
                                    });
                                    dots.forEach((dot, i) => {
                                        dot.classList.toggle('bg-nataliving-leaf', i === idx);
                                        dot.classList.toggle('bg-gray-300', i !== idx);
                                    });
                                    thumbnails.forEach((thumb, i) => {
                                        thumb.classList.toggle('ring-2', i === idx);
                                        thumb.classList.toggle('ring-nataliving-leaf', i === idx);
                                        thumb.classList.toggle('ring-1', i !== idx);
                                        thumb.classList.toggle('ring-gray-200', i !== idx);
                                    });
                                    if (counter) counter.textContent = idx + 1;
                                    current = idx;
                                }

                                if (slides.length > 0) showSlide(0);

                                if (prevBtn) {
                                    prevBtn.addEventListener('click', () => {
                                        showSlide((current - 1 + slides.length) % slides.length);
                                    });
                                }
                                if (nextBtn) {
                                    nextBtn.addEventListener('click', () => {
                                        showSlide((current + 1) % slides.length);
                                    });
                                }
                                dots.forEach((dot, i) => {
                                    dot.addEventListener('click', () => showSlide(i));
                                });
                                thumbnails.forEach((thumb, i) => {
                                    thumb.addEventListener('click', () => showSlide(i));
                                });

                                // Zoom functionality
                                if (zoomBtn) {
                                    zoomBtn.addEventListener('click', () => {
                                        const img = slides[current].querySelector('img');
                                        if (!img) return;
                                        const modal = document.createElement('div');
                                        modal.style.position = 'fixed';
                                        modal.style.top = 0;
                                        modal.style.left = 0;
                                        modal.style.width = '100vw';
                                        modal.style.height = '100vh';
                                        modal.style.background = 'rgba(0,0,0,0.8)';
                                        modal.style.display = 'flex';
                                        modal.style.alignItems = 'center';
                                        modal.style.justifyContent = 'center';
                                        modal.style.zIndex = 9999;
                                        modal.innerHTML =
                                            `<img src="${img.src}" style="max-width:90vw;max-height:90vh;border-radius:1rem;box-shadow:0 2px 16px #0008;">`;
                                        modal.addEventListener('click', () => document.body.removeChild(modal));
                                        document.body.appendChild(modal);
                                    });
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
