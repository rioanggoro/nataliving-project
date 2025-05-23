<section class="py-14 bg-white" id="product">
    <x-container>
        <div class="text-center mb-10">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-800">Produk Terlaris Kami</h2>
            <p class="text-gray-500 mt-2">Temukan berbagai furniture terbaik pilihan pelanggan kami.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($products->take(4) as $product)
                <div
                    class="group bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition duration-300">
                    <div class="w-full aspect-square overflow-hidden">
                        <img src="{{ asset('storage/' . ($product->images->first()->image_url ?? 'img/default.jpg')) }}"
                            alt="{{ $product->name }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition duration-300" />
                    </div>

                    <div class="p-4">
                        <h3 class="font-semibold text-gray-800 text-base mb-1 line-clamp-1">
                            {{ $product->name }}
                        </h3>

                        <p class="text-sm text-gray-500 mb-1">
                            <span class="font-semibold text-gray-700">Harga:</span>
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </p>

                        <p class="text-sm text-gray-500 mb-4">
                            <span class="font-semibold text-gray-700">Preorder:</span> {{ $product->preorder }} Hari
                        </p>

                        <a href="https://wa.me/628112669123?text=Halo, saya tertarik dengan produk {{ urlencode(url(route('products.show', $product->slug))) }}"
                            target="_blank"
                            class="inline-block w-full text-center bg-nataliving-leaf hover:bg-nataliving-accent text-white font-semibold text-sm py-2 rounded-md transition mb-3">
                            Hubungi via WhatsApp
                        </a>
                        <a href="{{ route('shop.show', $product->slug) }}" target="_blank"
                            class="inline-block w-full text-nataliving-leaf text-center bg-white border border-nataliving-leaf hover:bg-nataliving-accent hover:text-white font-semibold text-sm py-2 rounded-md transition">
                            Lihat Produk
                        </a>
                    </div>
                </div>
            @empty
                <p class="text-gray-500 col-span-full text-center">Belum ada produk ditambahkan.</p>
            @endforelse
        </div>

        @if ($products->count() > 4)
            <div class="text-center mt-10">
                <a href="{{ route('shop.index') }}"
                    class="inline-block px-6 py-2 bg-nataliving-leaf hover:bg-nataliving-accent text-white font-semibold rounded-md transition">
                    Lihat Produk Lainnya
                </a>
            </div>
        @endif
    </x-container>
</section>
