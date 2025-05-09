@extends('layouts.main')

@section('title', 'Detail Produk - Nataliving Furniture')

@section('content')
    <div class="bg-gray-50">
        {{-- <!-- Page Header -->
        <div class="bg-white border-b">
            <div class="container mx-auto px-4 py-6">
                <div class="flex flex-wrap items-center gap-2 text-sm text-gray-500">
                    <a href="{{ route('home') }}" class="hover:text-green-700">Beranda</a>
                    <span>/</span>
                    <a href="{{ route('products.index') }}" class="hover:text-green-700">Produk</a>
                    <span>/</span>
                    <span class="font-medium text-gray-700">Kursi Santai Kayu Jati</span>
                </div>
            </div>
        </div>

        <div class="container mx-auto px-4 py-8">
            <div class="bg-white rounded-lg border shadow-sm overflow-hidden">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 p-6">
                    <!-- Product Images -->
                    <div>
                        <div class="mb-4 border rounded-lg overflow-hidden">
                            <img id="mainImage" src="{{ asset('img/placeholder.jpg') }}" alt="Kursi Santai Kayu Jati"
                                class="w-full h-80 object-cover">
                        </div>
                        <div class="grid grid-cols-4 gap-2">
                            @for ($i = 1; $i <= 4; $i++)
                                <div
                                    class="border rounded-lg overflow-hidden cursor-pointer hover:border-nataliving-leaf {{ $i === 1 ? 'border-nataliving-leaf' : 'border-gray-300' }}">
                                    <img src="{{ asset('img/placeholder.jpg') }}" alt="Thumbnail {{ $i }}"
                                        class="w-full h-20 object-cover thumbnail-image">
                                </div>
                            @endfor
                        </div>
                    </div>

                    <!-- Product Details -->
                    <div>
                        <span
                            class="inline-block bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full mb-2">Tersedia</span>
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">Kursi Santai Kayu Jati</h1>

                        <div class="flex items-center mb-4">
                            <div class="flex text-yellow-400">
                                @for ($j = 1; $j <= 5; $j++)
                                    <span class="material-icons text-sm">{{ $j <= 4 ? 'star' : 'star_border' }}</span>
                                @endfor
                            </div>
                            <span class="text-sm text-gray-500 ml-1">(24 ulasan)</span>
                        </div>

                        <div class="mb-4">
                            <span class="text-gray-400 text-lg line-through">Rp 5.500.000</span>
                            <div class="text-3xl font-bold text-gray-800">Rp 4.250.000</div>
                            <span class="text-green-700 text-sm">Hemat 23%</span>
                        </div>

                        <div class="border-t border-b py-4 my-4">
                            <div class="text-sm text-gray-600 leading-relaxed">
                                <p>Kursi santai dengan desain ergonomis yang terbuat dari kayu jati berkualitas tinggi.
                                    Cocok untuk ruang tamu, teras, atau area santai lainnya.</p>
                            </div>
                        </div>

                        <div class="space-y-4 mb-6">
                            <!-- Material -->
                            <div>
                                <span class="block text-sm font-medium text-gray-700 mb-1">Material</span>
                                <div class="flex gap-2">
                                    <button
                                        class="px-3 py-1 border border-nataliving-leaf bg-nataliving-leaf text-white rounded-md text-sm">Kayu
                                        Jati</button>
                                    <button
                                        class="px-3 py-1 border border-gray-300 text-gray-700 rounded-md text-sm hover:border-nataliving-leaf">Kayu
                                        Mahoni</button>
                                </div>
                            </div>

                            <!-- Color -->
                            <div>
                                <span class="block text-sm font-medium text-gray-700 mb-1">Warna</span>
                                <div class="flex gap-2">
                                    <button
                                        class="w-8 h-8 rounded-full bg-amber-800 border-2 border-white outline outline-2 outline-nataliving-leaf"></button>
                                    <button
                                        class="w-8 h-8 rounded-full bg-gray-800 border-2 border-white outline outline-1 outline-gray-300 hover:outline-nataliving-leaf"></button>
                                    <button
                                        class="w-8 h-8 rounded-full bg-amber-600 border-2 border-white outline outline-1 outline-gray-300 hover:outline-nataliving-leaf"></button>
                                </div>
                            </div>

                            <!-- Quantity -->
                            <div>
                                <span class="block text-sm font-medium text-gray-700 mb-1">Jumlah</span>
                                <div class="flex items-center">
                                    <button
                                        class="w-10 h-10 rounded-l-md bg-gray-100 border border-gray-300 flex items-center justify-center hover:bg-gray-200">
                                        <span class="material-icons">remove</span>
                                    </button>
                                    <input type="number" value="1" min="1"
                                        class="w-16 h-10 border-t border-b border-gray-300 text-center">
                                    <button
                                        class="w-10 h-10 rounded-r-md bg-gray-100 border border-gray-300 flex items-center justify-center hover:bg-gray-200">
                                        <span class="material-icons">add</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 text-sm text-gray-600">
                            <div class="flex items-center gap-2 mb-2">
                                <span class="material-icons text-nataliving-leaf">local_shipping</span>
                                <span>Pengiriman ke seluruh Indonesia</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="material-icons text-nataliving-leaf">verified</span>
                                <span>Garansi 1 tahun</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Tabs -->
                <div class="border-t">
                    <div class="flex border-b overflow-x-auto">
                        <button
                            class="px-6 py-3 font-medium text-nataliving-leaf border-b-2 border-nataliving-leaf whitespace-nowrap">Deskripsi</button>
                        <button
                            class="px-6 py-3 font-medium text-gray-500 hover:text-gray-700 whitespace-nowrap">Spesifikasi</button>
                        <button class="px-6 py-3 font-medium text-gray-500 hover:text-gray-700 whitespace-nowrap">Ulasan
                            (24)</button>
                    </div>

                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-4">Deskripsi Produk</h3>
                        <div class="text-gray-600 space-y-4">
                            <p>Kursi santai dari kayu jati solid ini merupakan perpaduan sempurna antara kenyamanan dan
                                keindahan. Dibuat dengan keahlian tukang kayu berpengalaman, kursi ini tidak hanya
                                menawarkan tempat duduk yang nyaman tetapi juga menjadi elemen dekoratif yang mempercantik
                                ruangan Anda.</p>

                            <p>Kayu jati yang digunakan merupakan kayu jati pilihan dengan kualitas terbaik, dikeringkan
                                secara alami untuk memastikan kekuatan dan ketahanannya. Finishing menggunakan bahan ramah
                                lingkungan yang aman untuk keluarga Anda.</p>

                            <h4 class="font-medium mt-6 mb-2">Keunggulan Produk:</h4>
                            <ul class="list-disc pl-5 space-y-1">
                                <li>Terbuat dari kayu jati solid berkualitas tinggi</li>
                                <li>Desain ergonomis yang nyaman untuk bersantai</li>
                                <li>Konstruksi kokoh dan tahan lama</li>
                                <li>Finishing halus dengan lapisan pelindung anti rayap</li>
                                <li>Mudah dibersihkan dan dirawat</li>
                                <li>Cocok untuk interior maupun eksterior (teras/beranda)</li>
                            </ul>

                            <h4 class="font-medium mt-6 mb-2">Perawatan:</h4>
                            <p>Untuk menjaga keindahan dan ketahanan kursi, disarankan untuk membersihkan secara rutin
                                dengan kain lembab dan menghindari paparan sinar matahari langsung dalam waktu lama. Oleskan
                                minyak kayu setiap 6 bulan untuk menjaga kelembaban dan kilau alami kayu.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Products -->
            <div class="mt-12">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Produk Terkait</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @for ($i = 1; $i <= 4; $i++)
                        <div class="bg-white rounded-lg border shadow-sm overflow-hidden hover:shadow-md transition">
                            <a href="{{ route('products.show', $i) }}" class="block">
                                <img src="{{ asset('img/placeholder.jpg') }}" alt="Produk Terkait {{ $i }}"
                                    class="w-full h-48 object-cover">
                            </a>
                            <div class="p-4">
                                <h3 class="font-medium text-gray-800 mb-2">
                                    <a href="{{ route('products.show', $i) }}" class="hover:text-green-700">
                                        Furniture Kayu Terkait {{ $i }}
                                    </a>
                                </h3>
                                <div class="flex items-center mb-2">
                                    <div class="flex text-yellow-400">
                                        @for ($j = 1; $j <= 5; $j++)
                                            <span
                                                class="material-icons text-sm">{{ $j <= 4 ? 'star' : 'star_border' }}</span>
                                        @endfor
                                    </div>
                                    <span class="text-xs text-gray-500 ml-1">(18)</span>
                                </div>
                                <div class="font-bold text-gray-800">Rp
                                    {{ number_format(rand(2000000, 4000000), 0, ',', '.') }}</div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>

    <script>
        // Image gallery functionality
        document.addEventListener('DOMContentLoaded', function() {
            const thumbnails = document.querySelectorAll('.thumbnail-image');
            const mainImage = document.getElementById('mainImage');

            thumbnails.forEach(thumbnail => {
                thumbnail.addEventListener('click', function() {
                    mainImage.src = this.src;

                    // Remove border from all thumbnails and add to selected
                    thumbnails.forEach(thumb => {
                        thumb.parentElement.classList.remove('border-nataliving-leaf');
                        thumb.parentElement.classList.add('border-gray-300');
                    });
                    this.parentElement.classList.remove('border-gray-300');
                    this.parentElement.classList.add('border-nataliving-leaf');
                });
            });
        });
    </script> --}}

        <div class="min-h-[60vh] flex items-center justify-center bg-gray-50 px-4">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-nataliving-leaf mb-4">Oops!</h1>
                <p class="text-lg text-gray-700 mb-2">Halaman produk ini masih dalam pengembangan.</p>
                <p class="text-gray-500 mb-6">Silakan kembali nanti atau hubungi kami untuk informasi lebih lanjut.</p>
                <a href="{{ route('shop.index') }}"
                    class="inline-block px-6 py-2 bg-nataliving-leaf hover:bg-nataliving-accent text-white font-semibold rounded-md transition">
                    Kembali ke Produk
                </a>
            </div>
        </div>
    @endsection
