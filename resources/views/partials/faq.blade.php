<script src="https://unpkg.com/alpinejs" defer></script>

<section class="py-12 bg-white">
    <x-container>
        <h2 class="text-2xl md:text-3xl font-bold text-gray-800 text-center mb-8">
            Pertanyaan yang Sering Diajukan
        </h2>

        <div class="max-w-3xl mx-auto space-y-4">
            @php
                $faqs = [
                    [
                        'question' => 'Apakah produk furniture bisa custom sesuai permintaan?',
                        'answer' =>
                            'Ya, kami menerima pesanan custom sesuai ukuran, warna, dan desain yang Anda inginkan. Silakan hubungi tim kami melalui WhatsApp untuk konsultasi.',
                    ],
                    [
                        'question' => 'Berapa lama estimasi pengiriman produk?',
                        'answer' =>
                            'Waktu pengiriman tergantung lokasi Anda dan jenis produk. Produk custom biasanya membutuhkan waktu 21-30 hari kerja.',
                    ],
                    [
                        'question' => 'Apakah ada garansi untuk produk?',
                        'answer' =>
                            'Kami memberikan garansi selama 2x24 jam setelah produk diterima untuk klaim kerusakan produksi atau kesalahan pengiriman.',
                    ],
                    [
                        'question' => 'Bagaimana cara melakukan pemesanan?',
                        'answer' =>
                            'Pemesanan bisa dilakukan langsung melalui katalog kami atau dengan menghubungi admin WhatsApp untuk panduan dan konsultasi.',
                    ],
                    [
                        'question' => 'Kalo lokasi saya jauh, apakah bisa DP pelunasan dilokasi?',
                        'answer' =>
                            'Bisa Pak Bu, Dp Bisa Di 50% Dulu , Sisanya 50% bisa dibayarkan ketika pesanan sudah sampai ditangan Bapak ibu.',
                    ],
                ];
            @endphp

            @foreach ($faqs as $index => $faq)
                <div x-data="{ open: {{ $index === 0 ? 'true' : 'false' }} }" class="border border-gray-200 rounded-lg">
                    <button @click="open = !open" class="w-full px-4 py-3 text-left flex justify-between items-center">
                        <span class="font-semibold text-gray-800">{{ $faq['question'] }}</span>
                        <svg x-show="!open" class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <svg x-show="open" x-cloak class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                        </svg>
                    </button>
                    <div x-show="open" x-transition class="px-4 pb-4 text-sm text-gray-600">
                        {{ $faq['answer'] }}
                    </div>
                </div>
            @endforeach
        </div>
    </x-container>
</section>
