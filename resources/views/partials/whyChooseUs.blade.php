<script src="https://unpkg.com/lucide@latest"></script>

<section class="py-10 bg-slate-100">
    <x-container>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-6 text-center">
            @php
                $features = [
                    ['icon' => 'truck', 'text' => 'Gratis Ongkir'],
                    ['icon' => 'badge-check', 'text' => 'Garansi Produk'],
                    ['icon' => 'shield-check', 'text' => 'Dijamin Ori'],
                    ['icon' => 'lock', 'text' => 'Pembayaran Aman'],
                    ['icon' => 'list-ordered', 'text' => 'Bisa Custom Order'],
                ];
            @endphp

            @foreach ($features as $feature)
                <div class="flex flex-col items-center">
                    <div class="mb-3 text-nataliving-wood">
                        <i data-lucide="{{ $feature['icon'] }}" class="w-10 h-10"></i>
                    </div>
                    <h1 class="text-md font-bold text-gray-700">{{ $feature['text'] }}</h1>
                </div>
            @endforeach
        </div>
    </x-container>
</section>

<!-- Aktifkan Lucide -->
<script>
    lucide.createIcons();
</script>
