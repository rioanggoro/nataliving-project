                <!-- Product Grid -->
                <div class="lg:w-3/4">
                    <!-- Products -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse ($products as $product)
                            <div class="bg-white rounded-lg border shadow-sm overflow-hidden hover:shadow-md transition">
                                <div class="block relative">
                                    <div class="w-full aspect-square overflow-hidden">
                                        <img src="{{ asset('storage/' . ($product->images->first()->image_url ?? 'img/default.jpg')) }}"
                                            alt="{{ $product->name }}"
                                            class="w-full h-full object-cover group-hover:scale-105 transition duration-300" />
                                    </div>
                                </div>

                                <div class="p-4">
                                    <h3 class="font-semibold text-gray-800 text-base mb-1 line-clamp-1">
                                        {{-- Jika ingin disable link sementara --}}
                                        <span class="hover:text-nataliving-leaf-700">{{ $product->name }}</span>
                                    </h3>

                                    <p class="text-sm text-gray-500 mb-1">
                                        <span class="font-semibold text-gray-700">Preorder:</span>
                                        {{ $product->preorder ?? 'Tidak diketahui' }} hari
                                    </p>
                                    <p class="text-lg font-bold text-gray-800 mb-4">
                                        Rp {{ number_format($product->price, 0, ',', '.') }}
                                    </p>

                                    <div class="flex flex-col gap-2">
                                        <a href="https://wa.me/628112669123?text=Halo, saya tertarik dengan produk {{ urlencode($product->name) }}"
                                            target="_blank"
                                            class="block w-full text-center bg-nataliving-leaf hover:bg-nataliving-accent text-white font-semibold text-sm py-2 rounded-md transition">
                                            Hubungi via WhatsApp
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-500 col-span-full text-center">Belum ada produk ditambahkan.</p>
                        @endforelse
                    </div>


                    <!-- Pagination -->
                    <div class="mt-10 flex justify-center">
                        @if ($products->hasPages())
                            <nav class="inline-flex items-center space-x-1" role="navigation" aria-label="Pagination">
                                {{-- Previous Page Link --}}
                                @if ($products->onFirstPage())
                                    <span class="px-3 py-2 rounded-md border text-gray-400">
                                        <span class="material-icons">chevron_left</span>
                                    </span>
                                @else
                                    <a href="{{ $products->previousPageUrl() }}"
                                        class="px-3 py-2 rounded-md border text-gray-600 hover:bg-gray-50">
                                        <span class="material-icons">chevron_left</span>
                                    </a>
                                @endif

                                {{-- Pagination Elements --}}
                                @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                                    @if ($page == $products->currentPage())
                                        <span
                                            class="px-4 py-2 rounded-md border bg-nataliving-leaf text-white">{{ $page }}</span>
                                    @else
                                        <a href="{{ $url }}"
                                            class="px-4 py-2 rounded-md border text-gray-700 hover:bg-gray-50">{{ $page }}</a>
                                    @endif
                                @endforeach

                                {{-- Next Page Link --}}
                                @if ($products->hasMorePages())
                                    <a href="{{ $products->nextPageUrl() }}"
                                        class="px-3 py-2 rounded-md border text-gray-600 hover:bg-gray-50">
                                        <span class="material-icons">chevron_right</span>
                                    </a>
                                @else
                                    <span class="px-3 py-2 rounded-md border text-gray-400">
                                        <span class="material-icons">chevron_right</span>
                                    </span>
                                @endif
                            </nav>
                        @endif
                    </div>

                </div>
