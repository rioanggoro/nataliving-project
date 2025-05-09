@extends('layouts.main')

@section('title', 'Toko Kami - Nataliving Furniture')

@section('content')
    <section class="bg-white">
        <!-- Page Header -->
        <div class="bg-white border-b">
            <div class="container mx-auto px-4 py-6">
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Toko Kami</h1>
                <nav class="flex flex-wrap items-center gap-2 mt-2 text-sm text-gray-500">
                    <a href="{{ route('home') }}" class="hover:text-nataliving-leaf">Beranda</a>
                    <span>/</span>
                    <span class="font-medium text-gray-700">Toko Kami</span>
                </nav>
            </div>
        </div>

        <!-- Section Content -->
        <div class="container mx-auto px-4 py-16">
            <div class="text-center max-w-3xl mx-auto mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Lokasi Showroom Nataliving</h2>
                <p class="text-gray-600">
                    Kunjungi showroom kami untuk melihat langsung berbagai koleksi furniture berkualitas tinggi dari
                    Nataliving.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
                <!-- Google Maps -->
                <div class="w-full h-[400px] rounded-lg overflow-hidden shadow-lg">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.2491783896697!2d110.71364067506418!3d-6.537427493452851!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7124da402d449d%3A0x1e02414f57b8e872!2sJl.%20K.H.%20Nawawi%2C%20RT.03%2FRW.01%2C%20Rw3%2C%20Sinanggul%2C%20Kec.%20Mlonggo%2C%20Kabupaten%20Jepara%2C%20Jawa%20Tengah%2059452!5e0!3m2!1sid!2sid!4v1715259800000!5m2!1sid!2sid"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <!-- Info Lokasi -->
                <div class="space-y-6 text-gray-700">
                    <div>
                        <h3 class="text-xl font-bold text-gray-800 mb-1">Showroom Pusat</h3>
                        <p>Jl. K.H. Nawawi, RT.03/RW.01, Rw3, Sinanggul, Kec. Mlonggo, Kabupaten Jepara, Jawa Tengah 59452
                        </p>
                        <p class="text-sm text-gray-500">Buka: Senin - Sabtu, 09.00 - 17.00 WIB</p>
                    </div>

                    <div>
                        <a href="https://wa.me/628112669123" target="_blank"
                            class="inline-block bg-nataliving-leaf hover:bg-nataliving-accent text-white font-semibold px-6 py-2 rounded-md transition">
                            Hubungi Kami via WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
