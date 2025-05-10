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
                    {{-- Filter Kategori --}}
                    <form method="GET" action="{{ route('shop.index') }}">
                        <div class="bg-white p-5 rounded-lg border shadow-sm">
                            <h3 class="font-semibold text-lg mb-4">Kategori</h3>
                            <div class="space-y-3">
                                @foreach ($categories as $cat)
                                    @php
                                        $slug = \Illuminate\Support\Str::slug($cat->name);
                                        $isChecked = in_array($cat->id, request()->get('category', []));
                                    @endphp
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <input type="checkbox" name="category[]" value="{{ $cat->id }}"
                                                id="cat-{{ $slug }}"
                                                class="h-4 w-4 text-nataliving-leaf border-gray-300 rounded focus:ring-nataliving-leaf"
                                                {{ $isChecked ? 'checked' : '' }}>
                                            <label for="cat-{{ $slug }}"
                                                class="ml-2 text-gray-700">{{ $cat->name }}</label>
                                        </div>
                                        <span class="text-sm text-gray-500">{{ $cat->products_count ?? 0 }} produk</span>
                                    </div>
                                @endforeach
                            </div>

                            <div class="mt-6 flex flex-col gap-3">
                                <button type="submit"
                                    class="w-full bg-nataliving-leaf hover:bg-nataliving-accent text-white font-semibold py-2 rounded-md transition">
                                    Terapkan Filter
                                </button>
                                <a href="{{ route('shop.index') }}"
                                    class="w-full text-center border border-gray-300 text-gray-700 hover:bg-gray-100 font-medium py-2 rounded-md transition">
                                    Reset Filter
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                @include('partials.product-grid')
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
