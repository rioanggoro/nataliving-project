<!-- Product Grid -->
<div class="lg:w-3/4">
    <!-- Products Grid - 2 columns on mobile, 3 columns on desktop -->
    <div class="grid grid-cols-2 md:grid-cols-3 gap-3 md:gap-6">
        @forelse ($products as $product)
            <div class="bg-white rounded-lg border shadow-sm overflow-hidden hover:shadow-md transition group">
                <a href="{{ route('shop.show', $product->slug) }}" class="block relative">
                    @if ($product->is_featured ?? false)
                        <span
                            class="absolute top-2 left-2 bg-nataliving-leaf text-white text-xs px-2 py-1 rounded z-10">Unggulan</span>
                    @endif
                    <div class="w-full aspect-square overflow-hidden">
                        <img src="{{ asset('storage/' . ($product->images->first()->image_url ?? 'img/default.jpg')) }}"
                            alt="{{ $product->name }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    </div>
                </a>

                <div class="p-3 md:p-4">
                    <div class="flex justify-between items-start mb-2">
                        <h1 class="font-bold text-gray-800 text-xl md:text-base line-clamp-2 flex-1">
                            <a href="{{ route('shop.show', $product->slug) }}"
                                class="hover:text-nataliving-leaf transition">
                                {{ $product->name }}
                            </a>
                        </h1>
                    </div>
                    <!-- Price -->
                    <div class="mb-3 md:mb-4">
                        @if (($product->original_price ?? 0) && $product->original_price > $product->price)
                            <div class="flex items-center gap-2 flex-wrap">
                                <span class="text-xs md:text-sm text-gray-400 line-through">
                                    Rp {{ number_format($product->original_price, 0, ',', '.') }}
                                </span>
                                <span class="bg-red-100 text-red-800 text-xs font-medium px-1.5 py-0.5 rounded">
                                    -{{ round((($product->original_price - $product->price) / $product->original_price) * 100) }}%
                                </span>
                            </div>
                        @endif
                        <div class="font-bold text-gray-800 text-sm md:text-base">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </div>
                    </div>

                    <!-- Preorder info -->
                    @if ($product->preorder ?? false)
                        <p class="text-sm text-gray-800 font-semibold mb-3">
                            Preorder: {{ $product->preorder }} hari
                        </p>
                    @endif

                    <!-- Action Buttons -->
                    <div class="space-y-2">

                        @php
                            // 1. Siapkan semua bagian pesan
                            $productName = '*' . $product->name . '*'; // Tambahkan bintang untuk teks tebal
                            $productUrl = route('shop.show', $product->slug);
                            $message = "Halo,\n\nSaya ingin bertanya tentang produk {$productName}\n{$productUrl}\n\nApakah bisa dibantu?";
                            $whatsappUrl = 'https://wa.me/62819870789?text=' . urlencode($message);
                        @endphp
                        <a href="{{ $whatsappUrl }}" target="_blank"
                            class="flex items-center justify-center w-full py-2 bg-nataliving-leaf hover:bg-nataliving-accent text-white font-medium text-xs md:text-sm rounded-md transition">
                            <span class="material-icons text-sm mr-1">chat</span>
                            <span class="hidden sm:inline">Hubungi via WhatsApp</span>
                            <span class="sm:hidden">WhatsApp</span>
                        </a>

                        <!-- View Product Button -->
                        <a href="{{ route('shop.show', $product->slug) }}"
                            class="flex items-center justify-center w-full py-2 border border-nataliving-leaf text-nataliving-leaf hover:bg-nataliving-leaf hover:text-white font-medium text-xs md:text-sm rounded-md transition">
                            <span class="material-icons text-sm mr-1">visibility</span>
                            Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12">
                <div class="flex flex-col items-center">
                    <span class="material-icons text-5xl text-gray-300 mb-4">inventory_2</span>
                    <h3 class="text-lg font-medium text-gray-900 mb-1">Produk tidak ditemukan</h3>
                    <p class="text-gray-500 mb-4">Coba ubah filter atau kata kunci pencarian Anda</p>
                    <a href="{{ route('shop.index') }}"
                        class="bg-nataliving-leaf hover:bg-nataliving-accent text-white px-4 py-2 rounded-md transition">
                        Lihat Semua Produk
                    </a>
                </div>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-10 flex justify-center">
        @if ($products->hasPages())
            <nav aria-label="Page navigation">
                <ul class="inline-flex -space-x-px text-sm md:text-base">
                    {{-- Previous Page Link --}}
                    <li>
                        @if ($products->onFirstPage())
                            <span
                                class="flex items-center justify-center px-3 md:px-4 h-8 md:h-10 ms-0 leading-tight text-gray-400 bg-white border border-e-0 border-gray-300 rounded-s-lg cursor-not-allowed">
                                <span class="hidden sm:inline">Previous</span>
                                <span class="sm:hidden">Prev</span>
                            </span>
                        @else
                            <a href="{{ $products->previousPageUrl() }}"
                                class="flex items-center justify-center px-3 md:px-4 h-8 md:h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 transition-colors">
                                <span class="hidden sm:inline">Previous</span>
                                <span class="sm:hidden">Prev</span>
                            </a>
                        @endif
                    </li>

                    {{-- Pagination Elements --}}
                    @php
                        $start = max($products->currentPage() - 2, 1);
                        $end = min($start + 4, $products->lastPage());
                        $start = max($end - 4, 1);
                    @endphp

                    {{-- First Page --}}
                    @if ($start > 1)
                        <li>
                            <a href="{{ $products->url(1) }}"
                                class="flex items-center justify-center px-3 md:px-4 h-8 md:h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 transition-colors">
                                1
                            </a>
                        </li>
                        @if ($start > 2)
                            <li>
                                <span
                                    class="flex items-center justify-center px-3 md:px-4 h-8 md:h-10 leading-tight text-gray-500 bg-white border border-gray-300">
                                    ...
                                </span>
                            </li>
                        @endif
                    @endif

                    {{-- Page Numbers --}}
                    @for ($page = $start; $page <= $end; $page++)
                        <li>
                            @if ($page == $products->currentPage())
                                <span aria-current="page"
                                    class="flex items-center justify-center px-3 md:px-4 h-8 md:h-10 text-white border border-gray-300 bg-nataliving-leaf hover:bg-green-800 font-medium">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $products->url($page) }}"
                                    class="flex items-center justify-center px-3 md:px-4 h-8 md:h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 transition-colors">
                                    {{ $page }}
                                </a>
                            @endif
                        </li>
                    @endfor

                    {{-- Last Page --}}
                    @if ($end < $products->lastPage())
                        @if ($end < $products->lastPage() - 1)
                            <li>
                                <span
                                    class="flex items-center justify-center px-3 md:px-4 h-8 md:h-10 leading-tight text-gray-500 bg-white border border-gray-300">
                                    ...
                                </span>
                            </li>
                        @endif
                        <li>
                            <a href="{{ $products->url($products->lastPage()) }}"
                                class="flex items-center justify-center px-3 md:px-4 h-8 md:h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 transition-colors">
                                {{ $products->lastPage() }}
                            </a>
                        </li>
                    @endif

                    {{-- Next Page Link --}}
                    <li>
                        @if ($products->hasMorePages())
                            <a href="{{ $products->nextPageUrl() }}"
                                class="flex items-center justify-center px-3 md:px-4 h-8 md:h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 transition-colors">
                                <span class="hidden sm:inline">Next</span>
                                <span class="sm:hidden">Next</span>
                            </a>
                        @else
                            <span
                                class="flex items-center justify-center px-3 md:px-4 h-8 md:h-10 leading-tight text-gray-400 bg-white border border-gray-300 rounded-e-lg cursor-not-allowed">
                                <span class="hidden sm:inline">Next</span>
                                <span class="sm:hidden">Next</span>
                            </span>
                        @endif
                    </li>
                </ul>
            </nav>

            <!-- Pagination Info -->
            <div class="mt-4 text-center">
                <p class="text-sm text-gray-600">
                    <span class="hidden md:inline">
                        <br> Menampilkan {{ $products->firstItem() }} - {{ $products->lastItem() }} dari
                        {{ $products->total() }} produk
                    </span>
                    <span class="md:hidden">
                        {{ $products->firstItem() }}-{{ $products->lastItem() }} dari {{ $products->total() }}
                    </span>
                </p>
            </div>
        @endif
    </div>
</div>

<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Mobile optimizations */
    @media (max-width: 640px) {
        .grid-cols-2>* {
            min-width: 0;
            /* Prevent overflow */
        }
    }
</style>
