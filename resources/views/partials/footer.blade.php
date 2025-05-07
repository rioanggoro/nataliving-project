<footer class="bg-nataliving-wood text-white pt-12 pb-6">
    <x-container>
        <div class="grid md:grid-cols-4 gap-10">
            <!-- Logo & Deskripsi -->
            <div>
                <img src="{{ asset('img/hero/logo_navbar.jpeg') }}" alt="Nataliving" class="h-12 mb-4">
                <p class="text-sm leading-relaxed text-white/80">
                    Nataliving Furniture menghadirkan produk kayu jati berkualitas langsung dari pengrajin Jepara untuk
                    kenyamanan dan estetika ruang Anda.
                </p>
            </div>

            <!-- Navigasi -->
            <div>
                <h4 class="text-lg font-semibold mb-3">Navigasi</h4>
                <ul class="space-y-2 text-sm text-white/80">
                    <li><a href="#" class="hover:text-white">Beranda</a></li>
                    <li><a href="#product" class="hover:text-white">Produk</a></li>
                    <li><a href="#" class="hover:text-white">Tentang Kami</a></li>
                    <li><a href="#" class="hover:text-white">Kontak</a></li>
                </ul>
            </div>

            <!-- Kategori Populer -->
            <div>
                <h4 class="text-lg font-semibold mb-3">Kategori Populer</h4>
                <ul class="space-y-2 text-sm text-white/80">
                    <li><a href="#" class="hover:text-white">Sofa</a></li>
                    <li><a href="#" class="hover:text-white">Meja TV</a></li>
                    <li><a href="#" class="hover:text-white">Lemari Pakaian</a></li>
                    <li><a href="#" class="hover:text-white">Meja Makan</a></li>
                </ul>
            </div>

            <!-- Kontak -->
            <div>
                <h4 class="text-lg font-semibold mb-3">Hubungi Kami</h4>
                <ul class="text-sm text-white/80 space-y-2">
                    <li>
                        <span class="block">WhatsApp:</span>
                        <a href="https://wa.me/6281234567890" class="hover:text-white">
                            +62 811 2669 123
                        </a>
                    </li>
                    <li>
                        <span class="block">Email:</span>
                        <a href="mailto:support@nataliving.com" class="hover:text-white">
                            admin@nataliving.co.id
                        </a>
                    </li>
                    <li>
                        <span class="block">Alamat:</span>
                        Sinanggul, RT 02 RW 01 Mlonggo 59452 , Jepara
                    </li>
                </ul>
            </div>
        </div>

        <!-- Copyright -->
        <div class="mt-10 border-t border-white/20 pt-6 text-center text-sm text-white/60">
            &copy; {{ date('Y') }} Nataliving Furniture. All rights reserved.
        </div>
    </x-container>
</footer>
