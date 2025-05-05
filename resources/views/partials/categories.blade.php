<section class="py-12 bg-white">
    <x-container>
        <div class="grid md:grid-cols-4 gap-8">
            <!-- Sidebar: Best of Category (Hanya tampil di desktop) -->
            <div class="hidden md:flex flex-col gap-4">
                <div class="bg-nataliving-wood text-white text-lg font-bold p-6 rounded-md text-center">
                    BEST OF <br /> CATEGORY
                </div>
                <img src="{{ asset('img/kategori/best-category.jpg') }}" alt="Best of Category"
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
                            ['name' => 'Sofa', 'img' => 'sofa.jpg'],
                            ['name' => 'Kursi Tamu', 'img' => 'kursi-tamu.jpg'],
                            ['name' => 'Meja TV', 'img' => 'meja-tv.jpg'],
                            ['name' => 'Bufet TV', 'img' => 'bufet-tv.jpg'],
                            ['name' => 'Kursi Makan', 'img' => 'kursi-makan.jpg'],
                            ['name' => 'Meja Makan', 'img' => 'meja-makan.jpg'],
                            ['name' => 'Tempat Tidur', 'img' => 'tempat-tidur.jpg'],
                            ['name' => 'Nakas', 'img' => 'nakas.jpg'],
                            ['name' => 'Meja Rias Minimalis', 'img' => 'meja-rias.jpg'],
                            ['name' => 'Meja Belajar', 'img' => 'meja-belajar.jpg'],
                            ['name' => 'Lemari Pakaian', 'img' => 'lemari.jpg'],
                            ['name' => 'Meja Coffee Table', 'img' => 'meja-coffee.jpg'],
                        ];
                    @endphp

                    @foreach ($categories as $cat)
                        <div class="flex flex-col items-center text-center">
                            <img src="{{ asset('img/kategori/' . $cat['img']) }}" alt="{{ $cat['name'] }}"
                                class="h-20 md:h-24 object-contain mb-2" />
                            <span class="text-xs md:text-sm font-medium text-gray-700">{{ $cat['name'] }}</span>
                        </div>
                    @endforeach
                </div>

                {{-- <!-- Tombol -->
                <div class="mt-8 text-center">
                    <a href="#"
                        class="inline-flex items-center gap-2 px-6 py-2 border text-sm font-semibold rounded hover:bg-gray-100">
                        <span class="material-icons text-base">grid_view</span> LIHAT SEMUA PRODUK
                    </a>
                </div> --}}
            </div>
        </div>
    </x-container>
</section>
