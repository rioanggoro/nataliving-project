@extends('layouts.main')

@section('title', 'Profil Perusahaan - Nataliving Furniture')

@section('content')
    <section class="py-16 bg-white" id="my-store">
        <div class="container mx-auto px-4">
            <div class="text-center max-w-3xl mx-auto mb-12">
                <span class="inline-block text-nataliving-leaf font-semibold mb-2">Toko Kami</span>
                <h2 class="text-3xl font-bold text-gray-800 mb-6">Lokasi Showroom Nataliving</h2>
                <p class="text-gray-600">
                    Kunjungi showroom kami untuk melihat langsung berbagai koleksi furniture terbaik dari Nataliving.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                <!-- Google Maps -->
                <div class="w-full h-[400px] rounded-lg overflow-hidden shadow-md">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.3027126788973!2d106.9863781748371!3d-6.22439599376552!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6992c328fd06c5%3A0x6d48f9cc594f9999!2sBekasi!5e0!3m2!1sid!2sid!4v1715213500000!5m2!1sid!2sid"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <!-- Informasi Lokasi -->
                <div class="space-y-6">
                    <div>
                        <h3 class="text-xl font-bold text-gray-800 mb-1">Showroom Pusat</h3>
                        <p class="text-gray-600">Jl. Raya Jepara No.123, Bekasi, Jawa Barat</p>
                        <p class="text-gray-500 text-sm">Buka: Senin - Sabtu, 09.00 - 17.00 WIB</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-800 mb-1">Cabang Jakarta</h3>
                        <p class="text-gray-600">Jl. Kemang Selatan No.45, Jakarta Selatan</p>
                        <p class="text-gray-500 text-sm">Buka: Setiap Hari, 10.00 - 20.00 WIB</p>
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
