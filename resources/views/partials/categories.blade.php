<section class="py-12 bg-slate-100">
    <x-container>
        <div class="grid md:grid-cols-4 gap-8">
            <!-- Sidebar: Best of Category (Hanya tampil di desktop) -->
            <div class="hidden md:flex flex-col gap-4">
                <div class="bg-nataliving-wood text-white text-lg font-bold p-6 rounded-md text-center">
                    BEST OF <br /> CATEGORY
                </div>
                <img src="{{ asset('img/category/ruang-tamu.jpeg') }}" alt="Best of Category"
                    class="rounded-lg shadow object-cover" />
            </div>

            <!-- Grid Kategori Produk -->
            <div class="md:col-span-3">
                <h2 class="text-xl md:text-2xl font-semibold text-gray-800 mb-6 border-b pb-2">
                    Koleksi Unggulan Nataliving
                </h2>

                <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-6 gap-4">
                    @php
                        $categories = [
                            ['id' => 1, 'name' => 'Sofa', 'img' => 'sofa.webp'],
                            ['id' => 2, 'name' => 'Kursi Tamu', 'img' => 'kursi-tamu.webp'],
                            ['id' => 3, 'name' => 'Meja TV', 'img' => 'meja-tv.webp'],
                            ['id' => 4, 'name' => 'Bufet TV', 'img' => 'bufet-tv.webp'],
                            ['id' => 5, 'name' => 'Kursi Makan', 'img' => 'kursi-makan.png'],
                            ['id' => 6, 'name' => 'Meja Makan', 'img' => 'meja-makan.webp'],
                            ['id' => 7, 'name' => 'Tempat Tidur', 'img' => 'tempat-tidur.webp'],
                            ['id' => 8, 'name' => 'Nakas', 'img' => 'nakas.webp'],
                            ['id' => 9, 'name' => 'Meja Rias', 'img' => 'meja-rias.webp'],
                            ['id' => 10, 'name' => 'Meja Belajar', 'img' => 'meja-belajar.webp'],
                            ['id' => 11, 'name' => 'Lemari Pakaian', 'img' => 'lemari-pakaian.webp'],
                            ['id' => 12, 'name' => 'Meja Coffee Table', 'img' => 'meja-coffee.webp'],
                            ['id' => 13, 'name' => 'Meja Marmer', 'img' => 'meja-marmer.png'],
                            ['id' => 14, 'name' => 'Outdoor Furniture', 'img' => 'outdoor.png'],
                            ['id' => 15, 'name' => 'Pintu Jati', 'img' => 'pintu-jati.png'],
                        ];
                    @endphp
                    @foreach ($categories as $cat)
                        <a href="{{ url('/shop') . '?category[]=' . $cat['id'] }}"
                            class="flex flex-col items-center text-center group">
                            <div class="overflow-hidden">
                                <img src="{{ asset('img/category/' . $cat['img']) }}" alt="{{ $cat['name'] }}"
                                    class="h-20 md:h-24 object-contain mb-2 transition-transform duration-300 group-hover:scale-125" />
                            </div>
                            <span class="text-xs md:text-sm font-medium text-gray-700 group-hover:text-nataliving-leaf">
                                {{ $cat['name'] }}
                            </span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </x-container>
</section>
