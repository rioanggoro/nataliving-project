<!-- Related Products -->
<div class="mt-12">
    <h2 class="text-2xl font-bold text-gray-800 mb-8 text-center md:text-left">Produk Terkait</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        @foreach ($relatedProducts->take(4) as $item)
            <div
                class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-all duration-300 ease-in-out group">
                <div class="relative">
                    <a href="{{ route('shop.show', $item->slug) }}" class="block aspect-square overflow-hidden">
                        <img src="{{ $item->images->first() ? asset('storage/' . $item->images->first()->image_url) : asset('img/placeholder.jpg') }}"
                            alt="{{ $item->name }}"
                            class="w-full h-full object-cover transition duration-300 group-hover:scale-105"
                            loading="lazy">
                    </a>
                </div>
                <div class="p-5">
                    <h3 class="font-medium text-gray-800 mb-2 line-clamp-2 leading-tight">
                        <a href="{{ route('shop.show', $item->slug) }}"
                            class="hover:text-nataliving-leaf transition-colors">
                            {{ $item->name }}
                        </a>
                    </h3>
                    <div class="font-bold text-gray-900 mt-3">
                        Rp {{ number_format($item->price, 0, ',', '.') }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
