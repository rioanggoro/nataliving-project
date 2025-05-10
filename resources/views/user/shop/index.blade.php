@extends('layouts.main')

@section('title', 'Produk Furniture - Nataliving Furniture')

@section('content')
    <div class="bg-gray-50">
        <header class="flex flex-col md:flex-row items-center justify-between px-4 md:px-6 py-4 border-b">
            <!-- Logo dan Menu Sosial -->
            <a href="{{ route('home') }}">
                <img src="{{ asset('img/hero/logo_navbar.jpeg') }}" alt="Nataliving Furniture"
                    class="hidden md:block md:h-14" />
            </a>

            <!-- Pencarian -->
            <form action="{{ route('shop.index') }}" method="GET" class="flex-grow w-full md:max-w-xl md:mx-6 mb-4 md:mb-0">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari Produk"
                    class="w-full border px-4 py-2 rounded-md" />
            </form>

        </header>
        <!-- Page Header -->
        <div class="bg-white border-b">
            <div class="container mx-auto px-4 py-6">
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Produk Furniture</h1>
                <div class="flex flex-wrap items-center gap-2 mt-2 text-sm text-gray-500">
                    <a href="{{ route('home') }}" class="hover:text-nataliving-leaf ">Beranda</a>
                    <span>/</span>
                    <span class="font-medium text-gray-700">Produk</span>
                </div>
            </div>
        </div>

        <div class="container mx-auto px-4 py-8">
            <div class="lg:flex gap-8">
                <!-- Mobile Filter Toggle -->
                <div class="lg:hidden mb-4">
                    <button id="filterToggle"
                        class="w-full flex items-center justify-between bg-white p-4 rounded-lg border shadow-sm">
                        <span class="font-medium">Filter & Kategori</span>
                        <span class="material-icons">filter_list</span>
                    </button>
                </div>

                <!-- Sidebar Filters - Hidden on mobile by default -->
                <div id="filterSidebar" class="hidden lg:block lg:w-1/4 space-y-6">
                    <!-- Categories -->
                    <div class="bg-white p-5 rounded-lg border shadow-sm">
                        <h3 class="font-semibold text-lg mb-4">Kategori</h3>
                        <div class="space-y-2">
                            <div class="flex items-center">
                                <input id="cat-all" type="checkbox" checked
                                    class="h-4 w-4 text-nataliving-leaf  rounded border-gray-300 focus:ring-nataliving-leaf">
                                <label for="cat-all" class="ml-2 text-gray-700">Semua Produk</label>
                            </div>
                            <div class="flex items-center">
                                <input id="cat-sofa" type="checkbox"
                                    class="h-4 w-4 text-nataliving-leaf  rounded border-gray-300 focus:ring-nataliving-leaf-700">
                                <label for="cat-sofa" class="ml-2 text-gray-700">Sofa</label>
                            </div>
                            <div class="flex items-center">
                                <input id="cat-table" type="checkbox"
                                    class="h-4 w-4 text-nataliving-leaf-700 rounded border-gray-300 focus:ring-nataliving-leaf-700">
                                <label for="cat-table" class="ml-2 text-gray-700">Meja</label>
                            </div>
                            <div class="flex items-center">
                                <input id="cat-chair" type="checkbox"
                                    class="h-4 w-4 text-nataliving-leaf-700 rounded border-gray-300 focus:ring-nataliving-leaf-700">
                                <label for="cat-chair" class="ml-2 text-gray-700">Kursi</label>
                            </div>
                            <div class="flex items-center">
                                <input id="cat-bed" type="checkbox"
                                    class="h-4 w-4 text-nataliving-leaf-700 rounded border-gray-300 focus:ring-nataliving-leaf-700">
                                <label for="cat-bed" class="ml-2 text-gray-700">Tempat Tidur</label>
                            </div>
                            <div class="flex items-center">
                                <input id="cat-cabinet" type="checkbox"
                                    class="h-4 w-4 text-nataliving-leaf-700 rounded border-gray-300 focus:ring-nataliving-leaf-700">
                                <label for="cat-cabinet" class="ml-2 text-gray-700">Lemari</label>
                            </div>
                        </div>
                    </div>

                    <!-- Price Range -->
                    <div class="bg-white p-5 rounded-lg border shadow-sm">
                        <h3 class="font-semibold text-lg mb-4">Rentang Harga</h3>
                        <div class="space-y-4">
                            <div>
                                <label for="min-price" class="block text-sm text-gray-600 mb-1">Harga Minimum</label>
                                <input type="number" id="min-price" placeholder="Rp 0"
                                    class="w-full border-gray-300 rounded-md focus:ring-nataliving-leaf-700 focus:border-nataliving-leaf-700">
                            </div>
                            <div>
                                <label for="max-price" class="block text-sm text-gray-600 mb-1">Harga Maksimum</label>
                                <input type="number" id="max-price" placeholder="Rp 50.000.000"
                                    class="w-full border-gray-300 rounded-md focus:ring-nataliving-leaf-700 focus:border-nataliving-leaf-700">
                            </div>
                            <button
                                class="w-full bg-nataliving-leaf hover:bg-nataliving-accent text-white py-2 rounded-md transition">
                                Terapkan Filter
                            </button>
                        </div>
                    </div>
                </div>

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
                        <nav class="flex items-center space-x-1">
                            <a href="#" class="px-3 py-2 rounded-md border text-gray-500 hover:bg-gray-50">
                                <span class="material-icons">chevron_left</span>
                            </a>
                            <a href="#" class="px-4 py-2 rounded-md border bg-nataliving-leaf text-white">1</a>
                            <a href="#" class="px-4 py-2 rounded-md border text-gray-700 hover:bg-gray-50">2</a>
                            <a href="#" class="px-4 py-2 rounded-md border text-gray-700 hover:bg-gray-50">3</a>
                            <a href="#" class="px-4 py-2 rounded-md border text-gray-700 hover:bg-gray-50">4</a>
                            <a href="#" class="px-4 py-2 rounded-md border text-gray-700 hover:bg-gray-50">5</a>
                            <a href="#" class="px-3 py-2 rounded-md border text-gray-500 hover:bg-gray-50">
                                <span class="material-icons">chevron_right</span>
                            </a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Mobile filter toggle
        document.getElementById('filterToggle').addEventListener('click', function() {
            const filterSidebar = document.getElementById('filterSidebar');
            filterSidebar.classList.toggle('hidden');
        });
    </script>
@endsection
