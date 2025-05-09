@extends('layouts.main')

@section('title', 'Profil Perusahaan - Nataliving Furniture')

@section('content')
    <div class="bg-gray-50">
        <!-- Page Header -->
        <div class="bg-white border-b">
            <div class="container mx-auto px-4 py-6">
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Profil Perusahaan</h1>
                <div class="flex flex-wrap items-center gap-2 mt-2 text-sm text-gray-500">
                    <a href="{{ route('home') }}" class="hover:text-nataliving-leaf">Beranda</a>
                    <span>/</span>
                    <span class="font-medium text-gray-700">Profil</span>
                </div>
            </div>
        </div>
        <!-- Hero Section -->
        <div class="relative bg-black/90 text-white">
            <div class="absolute inset-0 opacity-40">
                <img src="{{ asset('img/hero/bg_1.jpeg') }}" alt="Workshop Nataliving" class="w-full h-full object-cover">
            </div>
            <div class="relative container mx-auto px-4 py-20 md:py-32">
                <div class="max-w-2xl">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">Keahlian Dalam Setiap Detail</h2>
                    <p class="text-lg md:text-xl opacity-90 mb-6">
                        Nataliving Furniture adalah produsen furniture premium yang mengutamakan kualitas, keindahan, dan
                        keberlanjutan dalam setiap karya.
                    </p>
                    <a href="#tentang-kami"
                        class="inline-block bg-nataliving-leaf hover:bg-green-800 text-white font-medium px-6 py-3 rounded-md transition">
                        Pelajari Lebih Lanjut
                    </a>
                </div>
            </div>
        </div>
        <!-- About Us Section -->
        <div id="tentang-kami" class="container mx-auto px-4 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <span class="inline-block text-nataliving-leaf font-semibold mb-2">Tentang Kami</span>
                    <h2 class="text-3xl font-bold text-gray-800 mb-6">Kisah Kami</h2>
                    <div class="space-y-4 text-gray-600">
                        <p>
                            Didirikan pada tahun 2010, Nataliving Furniture berawal dari sebuah bengkel kecil di Jepara
                            dengan visi sederhana: menciptakan furniture berkualitas tinggi yang menggabungkan keindahan
                            kayu alami dengan desain modern.
                        </p>
                        <p>
                            Seiring berjalannya waktu, kami tumbuh menjadi produsen furniture terkemuka yang dikenal dengan
                            keahlian pengerjaan kayu, perhatian terhadap detail, dan komitmen pada keberlanjutan. Setiap
                            produk kami dibuat dengan tangan oleh pengrajin berpengalaman yang mewarisi tradisi pembuatan
                            furniture selama beberapa generasi.
                        </p>
                        <p>
                            Hari ini, Nataliving Furniture melayani pelanggan di seluruh Indonesia dan telah mulai
                            memperluas jangkauan ke pasar internasional, membawa keindahan furniture kayu Indonesia ke
                            rumah-rumah di seluruh dunia.
                        </p>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <img src="{{ asset('img/profile/crafting-process.jpeg') }}" alt="Crafting Process"
                        class="rounded-lg shadow-md h-64 w-full object-cover">
                    <img src="{{ asset('img/profile/furniture-detail.jpeg') }}" alt="Furniture Detail"
                        class="rounded-lg shadow-md h-64 w-full object-cover mt-8">
                    <img src="{{ asset('img/profile/craftsman.jpeg') }}" alt="Craftsman"
                        class="rounded-lg shadow-md h-64 w-full object-cover mt-8">
                    <img src="{{ asset('img/profile/finished-product.jpeg') }}" alt="Finished Product"
                        class="rounded-lg shadow-md h-64 w-full object-cover">
                </div>
            </div>
        </div>
        @include('partials.vision-mission')
        <!-- Values -->
        <div class=" mx-auto px-4 py-16  bg-nataliving-leaf w-full">
            <div class="text-center max-w-3xl mx-auto mb-12">
                <span class="inline-block text-white font-semibold mb-2">Nilai-Nilai Kami</span>
                <h2 class="text-3xl font-bold text-white mb-6">Prinsip Yang Kami Pegang</h2>
                <p class="text-white">
                    Nilai-nilai ini menjadi panduan kami dalam setiap aspek bisnis, dari pemilihan material hingga layanan
                    pelanggan.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 text-center">
                    <div class="w-16 h-16 bg-nataliving-leaf/10 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="material-icons text-3xl text-nataliving-leaf">eco</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-3">Keberlanjutan</h3>
                    <p class="text-gray-600">
                        Kami berkomitmen untuk menggunakan kayu dari sumber yang bertanggung jawab dan menerapkan praktik
                        produksi yang meminimalkan dampak lingkungan.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 text-center">
                    <div class="w-16 h-16 bg-nataliving-leaf/10 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="material-icons text-3xl text-nataliving-leaf">handyman</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-3">Keahlian</h3>
                    <p class="text-gray-600">
                        Setiap produk kami dibuat oleh pengrajin terampil yang memiliki pengalaman bertahun-tahun dalam seni
                        pembuatan furniture kayu.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 text-center">
                    <div class="w-16 h-16 bg-nataliving-leaf/10 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="material-icons text-3xl text-nataliving-leaf">design_services</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-3">Inovasi</h3>
                    <p class="text-gray-600">
                        Kami terus mengembangkan desain baru dan teknik produksi yang menggabungkan tradisi dengan tren
                        kontemporer.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 text-center">
                    <div class="w-16 h-16 bg-nataliving-leaf/10 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="material-icons text-3xl text-nataliving-leaf">verified</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-3">Kualitas</h3>
                    <p class="text-gray-600">
                        Kami tidak berkompromi dalam hal kualitas, memastikan setiap produk memenuhi standar tertinggi dalam
                        hal bahan, konstruksi, dan finishing.
                    </p>
                </div>
            </div>
        </div>
        @include('partials.team')
    </div>
@endsection
