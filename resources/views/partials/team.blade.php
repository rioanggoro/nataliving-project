<!-- Team -->
<div class="container mx-auto px-4 py-16">
    <div class="text-center max-w-3xl mx-auto mb-12">
        <span class="inline-block text-nataliving-leaf font-semibold mb-2">Tim Kami</span>
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Orang-Orang Di Balik Nataliving</h2>
        <p class="text-gray-600">
            Kenali tim berdedikasi yang membuat Nataliving Furniture menjadi seperti sekarang.
        </p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        @php
            $teams = [
                [
                    'name' => 'Irfan Aprilianto',
                    'position' => 'CEO',
                    'desc' => 'Pemimpin utama dengan visi membangun Nataliving menjadi brand furnitur terpercaya.',
                    'img' => 'img/people/ceo.png',
                ],
                [
                    'name' => 'Nining Candra',
                    'position' => 'Komisaris',
                    'desc' => 'Mengawasi arah bisnis dan strategi jangka panjang Nataliving.',
                    'img' => 'img/people/komisaris.png',
                ],
                [
                    'name' => 'Abdul Azis',
                    'position' => 'Kepala Desainer',
                    'desc' => 'Bertanggung jawab atas konsep dan desain setiap produk.',
                    'img' => 'img/people/divhead.png',
                ],
                [
                    'name' => 'Yanhya Firmansyah',
                    'position' => 'Manajer Produksi',
                    'desc' => 'Mengatur kualitas produksi dan efisiensi dalam pembuatan furnitur.',
                    'img' => 'img/people/manager.png',
                ],
            ];
        @endphp

        @foreach ($teams as $member)
            <div class="bg-white rounded-lg shadow-sm overflow-hidden group">
                <div class="relative">
                    <div class="aspect-[4/5] w-full overflow-hidden">
                        <img src="{{ asset($member['img']) }}" alt="{{ $member['name'] }}"
                            class="w-full h-full object-cover object-top" />
                    </div>

                    <div
                        class="absolute inset-0 bg-nataliving-leaf/80 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="flex space-x-3">
                            <a href="#"
                                class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-nataliving-leaf hover:bg-gray-100">
                                <span class="material-icons text-xl">email</span>
                            </a>
                            <a href="#"
                                class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-nataliving-leaf hover:bg-gray-100">
                                <span class="material-icons text-xl">phone</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-800">{{ $member['name'] }}</h3>
                    <p class="text-nataliving-leaf font-medium mb-3">{{ $member['position'] }}</p>
                    <p class="text-gray-600 text-sm">{{ $member['desc'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
