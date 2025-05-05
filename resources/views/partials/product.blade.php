<section class="py-12 bg-white">
    <x-container>
        <div class="max-w-screen-xl mx-auto px-4 md:px-6 lg:px-8">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4">Produk Terlaris Kami</h2>
            <p class="text-gray-500 mb-8">Temukan berbagai furniture terbaik pilihan pelanggan kami.</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

                @forelse ($products as $product)
                    <div class="bg-white border rounded-lg overflow-hidden shadow hover:shadow-md transition">
                        <img src="{{ asset('storage/' . ($product->images->first()->image_url ?? 'img/default.jpg')) }}"
                            alt="{{ $product->name }}" class="w-full h-48 object-cover" />
                        <div class="p-4">
                            <h3 class="font-semibold text-gray-800 text-sm mb-1">{{ $product->name }}</h3>
                            <p class="text-sm text-gray-500 mb-4">Rp {{ number_format($product->price, 0, ',', '.') }}
                            </p>
                            <a href="https://wa.me/6281234567890?text=Halo, saya tertarik dengan produk {{ urlencode($product->name) }}"
                                target="_blank"
                                class="inline-block w-full text-center bg-nataliving-leaf text-white text-sm py-2 rounded hover:bg-amber-800 transition">
                                Hubungi via WhatsApp
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 col-span-full text-center">Belum ada produk ditambahkan.</p>
                @endforelse

            </div>
        </div>
    </x-container>
</section>
