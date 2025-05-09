        <!-- Testimonials -->
        <div class="container mx-auto px-4 py-16">
            <div class="text-center max-w-3xl mx-auto mb-12">
                <span class="inline-block text-nataliving-leaf font-semibold mb-2">Testimoni</span>
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Apa Kata Klien Kami</h2>
                <p class="text-gray-600">
                    Pendapat dari klien-klien yang telah mempercayakan kebutuhan furniture mereka kepada kami.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @php
                    $testimonials = [
                        [
                            'name' => 'Budi Santoso',
                            'location' => 'Jakarta',
                            'rating' => 5,
                            'text' =>
                                'Kualitas furniture dari Nataliving sangat luar biasa. Kayu yang digunakan sangat berkualitas dan finishing-nya sempurna. Sudah 3 tahun berlalu dan furniture masih terlihat seperti baru.',
                        ],
                        [
                            'name' => 'Siti Rahayu',
                            'location' => 'Bandung',
                            'rating' => 5,
                            'text' =>
                                'Pelayanan yang sangat profesional. Tim Nataliving membantu saya memilih furniture yang tepat untuk rumah baru saya. Hasilnya sangat memuaskan dan sesuai dengan gaya yang saya inginkan.',
                        ],
                        [
                            'name' => 'Hendra Wijaya',
                            'location' => 'Bali',
                            'rating' => 4.5,
                            'text' =>
                                'Sebagai pemilik hotel, saya sangat puas dengan furniture kustom yang dibuat oleh Nataliving. Mereka mampu menghadirkan desain yang unik namun tetap fungsional dan tahan lama.',
                        ],
                    ];
                @endphp

                @foreach ($testimonials as $item)
                    <div class="bg-white p-6 rounded-lg shadow-md border border-gray-100">
                        <div class="flex text-yellow-400 mb-4">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= floor($item['rating']))
                                    <span class="material-icons">star</span>
                                @elseif ($i - $item['rating'] == 0.5)
                                    <span class="material-icons">star_half</span>
                                @else
                                    <span class="material-icons text-gray-300">star</span>
                                @endif
                            @endfor
                        </div>

                        <p class="text-gray-600 italic mb-6">"{{ $item['text'] }}"</p>

                        <div class="flex items-center">
                            <div
                                class="w-12 h-12 rounded-full bg-nataliving-leaf text-white flex items-center justify-center font-bold mr-4">
                                {{ strtoupper(substr($item['name'], 0, 1)) }}
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800">{{ $item['name'] }}</h4>
                                <p class="text-sm text-gray-500">{{ $item['location'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
