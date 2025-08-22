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
                    <li><a href="{{ route('home') }}" class="hover:text-white">Beranda</a></li>
                    <li><a href="{{ route('shop.index') }}" class="hover:text-white">Produk</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-white">Tentang Kami</a></li>
                    <li><a href="{{ route('my-store') }}" class="hover:text-white">Kontak</a></li>
                </ul>
            </div>

            <!-- Kategori Populer -->
            @php
                $popularCategories = [
                    ['name' => 'Sofa', 'id' => 1],
                    ['name' => 'Meja TV', 'id' => 3],
                    ['name' => 'Lemari Pakaian', 'id' => 11],
                    ['name' => 'Meja Makan', 'id' => 6],
                ];
            @endphp

            <div>
                <h4 class="text-lg font-semibold mb-3">Kategori Populer</h4>
                <ul class="space-y-2 text-sm text-white/80">
                    @foreach ($popularCategories as $category)
                        <li>
                            <a href="{{ url('/shop') . '?category[]=' . $category['id'] }}" class="hover:text-white">
                                {{ $category['name'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>


            <!-- Kontak -->
            <div>
                <h4 class="text-lg font-semibold mb-3">Hubungi Kami</h4>
                <ul class="text-sm text-white/80 space-y-2">
                    <li>
                        <span class="block">WhatsApp:</span>
                        <a href="https://wa.me/62819870789" class="hover:text-white">
                            +62 819 870 789
                        </a>
                    </li>
                    <li>
                        <span class="block">Email:</span>
                        <a href="mailto:support@nataliving.com" class="hover:text-white">
                            natalivingfurniture@gmail.com
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
