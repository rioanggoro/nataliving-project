            <!-- Main Product Section -->
            <div class="bg-white shadow-lg rounded-3xl overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-0">
                    <!-- Product Gallery Section -->
                    <div class="p-4 md:p-6 bg-gray-50 border-r border-gray-100">
                        <!-- Main Image Carousel -->
                        <div id="default-carousel" class="relative w-full mb-4" data-carousel="slide">
                            <!-- Carousel wrapper -->
                            <div class="relative h-[300px] md:h-[500px] overflow-hidden rounded-2xl shadow-lg bg-white">
                                @foreach ($product->images as $index => $image)
                                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                        <img src="{{ asset('storage/' . $image->image_url) }}"
                                            class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                            alt="{{ $product->name }} - Image {{ $index + 1 }}">

                                        <!-- Image Counter -->
                                        @if ($product->images->count() > 1)
                                            <div
                                                class="absolute bottom-4 right-4 bg-black/60 text-white text-xs px-3 py-1.5 rounded-full backdrop-blur-sm">
                                                <span class="current-slide">{{ $index + 1 }}</span> /
                                                {{ $product->images->count() }}
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>

                            @if ($product->images->count() > 1)
                                <!-- Slider indicators (dots) -->
                                <div
                                    class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                                    @foreach ($product->images as $index => $image)
                                        <button type="button"
                                            class="w-3 h-3 rounded-full bg-white/50 hover:bg-white/80 transition-colors duration-200 {{ $index === 0 ? 'bg-white' : '' }}"
                                            aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                                            aria-label="Slide {{ $index + 1 }}"
                                            data-carousel-slide-to="{{ $index }}">
                                        </button>
                                    @endforeach
                                </div>

                                <!-- Slider controls -->
                                <button type="button"
                                    class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-2 md:px-4 cursor-pointer group focus:outline-none"
                                    data-carousel-prev>
                                    <span
                                        class="inline-flex items-center justify-center w-8 h-8 md:w-10 md:h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none transition-all duration-200">
                                        <svg class="w-3 h-3 md:w-4 md:h-4 text-white rtl:rotate-180" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M5 1 1 5l4 4" />
                                        </svg>
                                        <span class="sr-only">Previous</span>
                                    </span>
                                </button>
                                <button type="button"
                                    class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-2 md:px-4 cursor-pointer group focus:outline-none"
                                    data-carousel-next>
                                    <span
                                        class="inline-flex items-center justify-center w-8 h-8 md:w-10 md:h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none transition-all duration-200">
                                        <svg class="w-3 h-3 md:w-4 md:h-4 text-white rtl:rotate-180" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 9 4-4-4-4" />
                                        </svg>
                                        <span class="sr-only">Next</span>
                                    </span>
                                </button>
                            @endif
                        </div>

                        <!-- Thumbnails Gallery -->
                        @if ($product->images->count() > 1)
                            <div class="flex gap-2 md:gap-3 overflow-x-auto pb-2 scrollbar-hide">
                                @foreach ($product->images as $index => $image)
                                    <div class="thumb flex-shrink-0 cursor-pointer rounded-lg md:rounded-xl overflow-hidden group relative {{ $index === 0 ? 'ring-2 ring-nataliving-leaf' : 'ring-1 ring-gray-200' }}"
                                        data-slide="{{ $index }}" data-carousel-slide-to="{{ $index }}">
                                        <div class="w-16 h-16 md:w-20 md:h-20 overflow-hidden">
                                            <img src="{{ asset('storage/' . $image->image_url) }}"
                                                class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110"
                                                alt="Thumbnail {{ $index + 1 }}">
                                        </div>
                                        <div
                                            class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-colors duration-200">
                                        </div>
                                    </div>
                                @endforeach
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

                        <!-- Product Description - Mobile Only -->
                        <div class="mb-6 md:hidden">
                            <div class="text-gray-600 text-sm leading-relaxed">
                                {{ Str::limit(strip_tags($product->description), 150) }}
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="grid grid-cols-2 gap-3 md:gap-4">
                            <!-- Hubungi via WhatsApp -->
                            <a href="https://wa.me/628112669123?text=Halo, saya tertarik dengan produk {{ urlencode($product->name) }}"
                                target="_blank"
                                class="flex items-center justify-center gap-2 py-2.5 md:py-3 border-2 border-nataliving-leaf text-nataliving-leaf hover:bg-nataliving-leaf hover:text-white font-semibold rounded-xl transition-all duration-200 shadow-sm hover:shadow-md">
                                <span class="material-icons text-lg md:text-xl">chat</span>
                                <span class="text-sm md:text-base">WhatsApp</span>
                            </a>

                            <!-- Bagikan -->
                            <button type="button"
                                class="flex items-center justify-center gap-2 py-2.5 md:py-3 border-2 border-gray-300 text-gray-700 hover:bg-gray-100 hover:border-gray-400 font-medium rounded-xl transition duration-200">
                                <span class="material-icons text-lg md:text-xl">share</span>
                                <span class="text-sm md:text-base">Bagikan</span>
                            </button>
                        </div>


                        <!-- Additional Info -->
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
                    </div>
                </div>
            </div>
