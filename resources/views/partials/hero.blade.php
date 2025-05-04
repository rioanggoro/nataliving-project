<section class="relative h-[80vh] bg-cover bg-center text-white"
    style="background-image: url('{{ asset('img/hero/bg_1.jpeg') }}');">
    <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/30 to-black/0 flex items-center">
        <x-container class="mx-0">
            <div class="grid md:grid-cols-4 gap-8 items-center">
                <!-- Spacer untuk sejajarkan dengan sidebar -->
                <div class="hidden md:block"></div>

                <!-- Konten teks -->
                <div class="md:col-span-3 max-w-lg">
                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4 leading-tight">
                        Kenyamanan<br />
                        dan Keanggunan<br />
                        Furniture Anda
                    </h1>
                    <p class="mb-6 text-xs md:text-sm lg:text-base">
                        Temukan berbagai furniture yang menggabungkan desain modern dengan kenyamanan tiada tara.
                    </p>
                    <a href="#"
                        class="inline-block bg-green-700 hover:bg-green-800 text-white font-semibold px-4 md:px-6 py-2 rounded text-sm md:text-base">
                        Dapatkan Sekarang
                    </a>
                </div>
            </div>
        </x-container>
    </div>
</section>
