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
        <div class="relative bg-gray-900 text-white">
            <div class="absolute inset-0 opacity-40">
                <img src="{{ asset('img/placeholder.jpg') }}" alt="Workshop Nataliving" class="w-full h-full object-cover">
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
                    <img src="{{ asset('img/placeholder.jpg') }}" alt="Workshop"
                        class="rounded-lg shadow-md h-64 w-full object-cover">
                    <img src="{{ asset('img/placeholder.jpg') }}" alt="Furniture Detail"
                        class="rounded-lg shadow-md h-64 w-full object-cover mt-8">
                    <img src="{{ asset('img/placeholder.jpg') }}" alt="Craftsman"
                        class="rounded-lg shadow-md h-64 w-full object-cover mt-8">
                    <img src="{{ asset('img/placeholder.jpg') }}" alt="Finished Product"
                        class="rounded-lg shadow-md h-64 w-full object-cover">
                </div>
            </div>
        </div>

        <!-- Vision & Mission -->
        <div class="bg-gray-100 py-16">
            <div class="container mx-auto px-4">
                <div class="text-center max-w-3xl mx-auto mb-12">
                    <span class="inline-block text-nataliving-leaf font-semibold mb-2">Visi & Misi</span>
                    <h2 class="text-3xl font-bold text-gray-800 mb-6">Apa Yang Kami Yakini</h2>
                    <p class="text-gray-600">
                        Kami percaya bahwa furniture yang baik tidak hanya indah dipandang, tetapi juga fungsional, tahan
                        lama, dan dibuat dengan memperhatikan dampak lingkungan.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-white p-8 rounded-lg shadow-sm">
                        <div class="w-16 h-16 bg-nataliving-leaf/10 rounded-full flex items-center justify-center mb-6">
                            <span class="material-icons text-3xl text-nataliving-leaf">visibility</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Visi Kami</h3>
                        <p class="text-gray-600 mb-4">
                            Menjadi produsen furniture terkemuka yang dikenal secara global atas keunggulan desain,
                            kualitas, dan keberlanjutan, serta menjadi pilihan utama bagi mereka yang menghargai keindahan
                            dan keahlian dalam pembuatan furniture.
                        </p>
                        <ul class="space-y-2 text-gray-600">
                            <li class="flex items-start">
                                <span class="material-icons text-nataliving-leaf mr-2 mt-0.5">check_circle</span>
                                <span>Menghadirkan keindahan kayu alami ke dalam setiap rumah</span>
                            </li>
                            <li class="flex items-start">
                                <span class="material-icons text-nataliving-leaf mr-2 mt-0.5">check_circle</span>
                                <span>Menginspirasi gaya hidup yang harmonis dengan alam</span>
                            </li>
                            <li class="flex items-start">
                                <span class="material-icons text-nataliving-leaf mr-2 mt-0.5">check_circle</span>
                                <span>Melestarikan tradisi kerajinan kayu Indonesia</span>
                            </li>
                        </ul>
                    </div>

                    <div class="bg-white p-8 rounded-lg shadow-sm">
                        <div class="w-16 h-16 bg-nataliving-leaf/10 rounded-full flex items-center justify-center mb-6">
                            <span class="material-icons text-3xl text-nataliving-leaf">flag</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Misi Kami</h3>
                        <p class="text-gray-600 mb-4">
                            Menciptakan furniture berkualitas tinggi yang menggabungkan keindahan alami kayu dengan desain
                            kontemporer, diproduksi secara bertanggung jawab oleh pengrajin terampil, dan memberikan nilai
                            jangka panjang bagi pelanggan kami.
                        </p>
                        <ul class="space-y-2 text-gray-600">
                            <li class="flex items-start">
                                <span class="material-icons text-nataliving-leaf mr-2 mt-0.5">check_circle</span>
                                <span>Menggunakan kayu dari sumber yang bertanggung jawab</span>
                            </li>
                            <li class="flex items-start">
                                <span class="material-icons text-nataliving-leaf mr-2 mt-0.5">check_circle</span>
                                <span>Mempekerjakan dan melatih pengrajin lokal</span>
                            </li>
                            <li class="flex items-start">
                                <span class="material-icons text-nataliving-leaf mr-2 mt-0.5">check_circle</span>
                                <span>Menerapkan praktik produksi yang ramah lingkungan</span>
                            </li>
                            <li class="flex items-start">
                                <span class="material-icons text-nataliving-leaf mr-2 mt-0.5">check_circle</span>
                                <span>Memberikan layanan pelanggan yang luar biasa</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Values -->
        <div class="container mx-auto px-4 py-16">
            <div class="text-center max-w-3xl mx-auto mb-12">
                <span class="inline-block text-nataliving-leaf font-semibold mb-2">Nilai-Nilai Kami</span>
                <h2 class="text-3xl font-bold text-gray-800 mb-6">Prinsip Yang Kami Pegang</h2>
                <p class="text-gray-600">
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

        <!-- Timeline -->
        <div class="bg-gray-100 py-16">
            <div class="container mx-auto px-4">
                <div class="text-center max-w-3xl mx-auto mb-12">
                    <span class="inline-block text-nataliving-leaf font-semibold mb-2">Perjalanan Kami</span>
                    <h2 class="text-3xl font-bold text-gray-800 mb-6">Sejarah Nataliving Furniture</h2>
                    <p class="text-gray-600">
                        Perjalanan kami dari bengkel kecil menjadi produsen furniture terkemuka.
                    </p>
                </div>

                <div class="relative">
                    <!-- Timeline Line -->
                    <div
                        class="absolute left-1/2 transform -translate-x-1/2 h-full w-1 bg-nataliving-leaf/20 hidden md:block">
                    </div>

                    <!-- Timeline Items -->
                    <div class="space-y-12 relative">
                        <!-- 2010 -->
                        <div class="flex flex-col md:flex-row items-center">
                            <div class="md:w-1/2 md:pr-12 md:text-right mb-6 md:mb-0">
                                <div class="bg-white p-6 rounded-lg shadow-sm inline-block">
                                    <h3 class="text-xl font-bold text-gray-800 mb-2">2010</h3>
                                    <h4 class="text-lg font-medium text-nataliving-leaf mb-3">Awal Mula</h4>
                                    <p class="text-gray-600">
                                        Nataliving Furniture didirikan sebagai bengkel kecil di Jepara dengan 5 pengrajin.
                                    </p>
                                </div>
                            </div>
                            <div
                                class="w-10 h-10 rounded-full bg-nataliving-leaf flex items-center justify-center text-white z-10 relative md:absolute md:left-1/2 md:transform md:-translate-x-1/2">
                                <span class="material-icons">star</span>
                            </div>
                            <div class="md:w-1/2 md:pl-12 hidden md:block"></div>
                        </div>

                        <!-- 2013 -->
                        <div class="flex flex-col md:flex-row items-center">
                            <div class="md:w-1/2 md:pr-12 hidden md:block"></div>
                            <div
                                class="w-10 h-10 rounded-full bg-nataliving-leaf flex items-center justify-center text-white z-10 relative md:absolute md:left-1/2 md:transform md:-translate-x-1/2">
                                <span class="material-icons">store</span>
                            </div>
                            <div class="md:w-1/2 md:pl-12 mb-6 md:mb-0">
                                <div class="bg-white p-6 rounded-lg shadow-sm inline-block">
                                    <h3 class="text-xl font-bold text-gray-800 mb-2">2013</h3>
                                    <h4 class="text-lg font-medium text-nataliving-leaf mb-3">Ekspansi Pertama</h4>
                                    <p class="text-gray-600">
                                        Membuka showroom pertama di Jakarta dan memperluas tim menjadi 20 pengrajin.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- 2016 -->
                        <div class="flex flex-col md:flex-row items-center">
                            <div class="md:w-1/2 md:pr-12 md:text-right mb-6 md:mb-0">
                                <div class="bg-white p-6 rounded-lg shadow-sm inline-block">
                                    <h3 class="text-xl font-bold text-gray-800 mb-2">2016</h3>
                                    <h4 class="text-lg font-medium text-nataliving-leaf mb-3">Sertifikasi</h4>
                                    <p class="text-gray-600">
                                        Mendapatkan sertifikasi kayu berkelanjutan dan mulai mengekspor ke negara tetangga.
                                    </p>
                                </div>
                            </div>
                            <div
                                class="w-10 h-10 rounded-full bg-nataliving-leaf flex items-center justify-center text-white z-10 relative md:absolute md:left-1/2 md:transform md:-translate-x-1/2">
                                <span class="material-icons">verified</span>
                            </div>
                            <div class="md:w-1/2 md:pl-12 hidden md:block"></div>
                        </div>

                        <!-- 2019 -->
                        <div class="flex flex-col md:flex-row items-center">
                            <div class="md:w-1/2 md:pr-12 hidden md:block"></div>
                            <div
                                class="w-10 h-10 rounded-full bg-nataliving-leaf flex items-center justify-center text-white z-10 relative md:absolute md:left-1/2 md:transform md:-translate-x-1/2">
                                <span class="material-icons">language</span>
                            </div>
                            <div class="md:w-1/2 md:pl-12 mb-6 md:mb-0">
                                <div class="bg-white p-6 rounded-lg shadow-sm inline-block">
                                    <h3 class="text-xl font-bold text-gray-800 mb-2">2019</h3>
                                    <h4 class="text-lg font-medium text-nataliving-leaf mb-3">Ekspansi Internasional</h4>
                                    <p class="text-gray-600">
                                        Mulai mengekspor ke pasar Eropa dan Amerika Utara, memperluas fasilitas produksi.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- 2022 -->
                        <div class="flex flex-col md:flex-row items-center">
                            <div class="md:w-1/2 md:pr-12 md:text-right mb-6 md:mb-0">
                                <div class="bg-white p-6 rounded-lg shadow-sm inline-block">
                                    <h3 class="text-xl font-bold text-gray-800 mb-2">2022</h3>
                                    <h4 class="text-lg font-medium text-nataliving-leaf mb-3">Inovasi Digital</h4>
                                    <p class="text-gray-600">
                                        Meluncurkan platform e-commerce dan layanan desain kustom online.
                                    </p>
                                </div>
                            </div>
                            <div
                                class="w-10 h-10 rounded-full bg-nataliving-leaf flex items-center justify-center text-white z-10 relative md:absolute md:left-1/2 md:transform md:-translate-x-1/2">
                                <span class="material-icons">computer</span>
                            </div>
                            <div class="md:w-1/2 md:pl-12 hidden md:block"></div>
                        </div>

                        <!-- Today -->
                        <div class="flex flex-col md:flex-row items-center">
                            <div class="md:w-1/2 md:pr-12 hidden md:block"></div>
                            <div
                                class="w-10 h-10 rounded-full bg-nataliving-leaf flex items-center justify-center text-white z-10 relative md:absolute md:left-1/2 md:transform md:-translate-x-1/2">
                                <span class="material-icons">today</span>
                            </div>
                            <div class="md:w-1/2 md:pl-12">
                                <div class="bg-white p-6 rounded-lg shadow-sm inline-block">
                                    <h3 class="text-xl font-bold text-gray-800 mb-2">Hari Ini</h3>
                                    <h4 class="text-lg font-medium text-nataliving-leaf mb-3">Terus Berkembang</h4>
                                    <p class="text-gray-600">
                                        Dengan lebih dari 100 pengrajin dan 5 showroom di seluruh Indonesia, kami terus
                                        berinovasi dan berkembang.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('partials.team')
        <!-- Workshop Gallery -->
        <div class="bg-gray-100 py-16">
            <div class="container mx-auto px-4">
                <div class="text-center max-w-3xl mx-auto mb-12">
                    <span class="inline-block text-nataliving-leaf font-semibold mb-2">Fasilitas Kami</span>
                    <h2 class="text-3xl font-bold text-gray-800 mb-6">Bengkel & Showroom</h2>
                    <p class="text-gray-600">
                        Lihat di mana keajaiban terjadi - dari kayu mentah hingga furniture indah yang Anda cintai.
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="col-span-2 row-span-2">
                        <img src="{{ asset('img/placeholder.jpg') }}" alt="Workshop Overview"
                            class="w-full h-full object-cover rounded-lg shadow-sm">
                    </div>
                    <div>
                        <img src="{{ asset('img/placeholder.jpg') }}" alt="Woodworking Tools"
                            class="w-full h-full object-cover rounded-lg shadow-sm">
                    </div>
                    <div>
                        <img src="{{ asset('img/placeholder.jpg') }}" alt="Wood Selection"
                            class="w-full h-full object-cover rounded-lg shadow-sm">
                    </div>
                    <div>
                        <img src="{{ asset('img/placeholder.jpg') }}" alt="Craftsman at Work"
                            class="w-full h-full object-cover rounded-lg shadow-sm">
                    </div>
                    <div>
                        <img src="{{ asset('img/placeholder.jpg') }}" alt="Finishing Process"
                            class="w-full h-full object-cover rounded-lg shadow-sm">
                    </div>
                    <div class="col-span-2">
                        <img src="{{ asset('img/placeholder.jpg') }}" alt="Jakarta Showroom"
                            class="w-full h-full object-cover rounded-lg shadow-sm">
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact CTA -->
        <div class="bg-nataliving-leaf text-white py-16">
            <div class="container mx-auto px-4 text-center">
                <h2 class="text-3xl font-bold mb-6">Tertarik Bekerja Sama Dengan Kami?</h2>
                <p class="max-w-2xl mx-auto mb-8 opacity-90">
                    Apakah Anda ingin menjadi mitra bisnis, distributor, atau memiliki pertanyaan tentang produk kami?
                    Jangan ragu untuk menghubungi kami.
                </p>
                <a href="#"
                    class="inline-block bg-white text-nataliving-leaf font-medium px-8 py-3 rounded-md hover:bg-gray-100 transition">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </div>
@endsection
