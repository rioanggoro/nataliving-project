@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">

        <!-- Card Total Produk -->
        <div class="bg-white rounded-lg shadow p-6 flex flex-col">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-gray-700 font-medium">Total Produk</h3>
                <div class="p-2 bg-blue-100 rounded-lg">
                    <i data-lucide="package" class="w-6 h-6 text-blue-600"></i>
                </div>
            </div>
            <div class="flex flex-col">
                <span class="text-3xl font-bold text-blue-600">{{ $totalProducts }}</span>
            </div>
        </div>
        <!-- Card Total Kategori -->
        <div class="bg-white rounded-lg shadow p-6 flex flex-col">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-gray-700 font-medium">Total Kategori</h3>
                <div class="p-2 bg-green-100 rounded-lg">
                    <i data-lucide="grid" class="w-6 h-6 text-green-600"></i>
                </div>
            </div>
            <div class="flex flex-col">
                <span class="text-3xl font-bold text-green-600">{{ $totalCategories }}</span>

            </div>
        </div>

    </div>

    <!-- Tabel Produk Terbaru -->
    <div class="bg-white rounded-lg shadow mb-6">
        <div class="p-6">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h2 class="text-xl font-bold text-gray-800">Produk Terbaru</h2>
                    <p class="text-sm text-gray-500">Daftar 5 produk yang baru ditambahkan</p>
                </div>
                <a href="{{ route('products.index') }}"
                    class="text-sm font-medium text-blue-600 hover:text-blue-800 flex items-center">
                    Lihat Semua
                    <i data-lucide="chevron-right" class="w-4 h-4 ml-1"></i>
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Gambar
                            </th>
                            <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama Produk
                            </th>
                            <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Kategori
                            </th>
                            <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Harga
                            </th>
                            <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Preorder
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($latestProducts as $product)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div
                                        class="h-10 w-10 rounded-full bg-gray-100 overflow-hidden flex items-center justify-center">
                                        @if ($product->images->first())
                                            <img src="{{ asset('storage/' . $product->images->first()->image_url) }}"
                                                alt="{{ $product->name }}" class="h-10 w-10 object-cover rounded-full">
                                        @else
                                            <i data-lucide="image" class="h-6 w-6 text-gray-400"></i>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $product->name }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">{{ $product->category->name ?? '-' }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Rp {{ number_format($product->price, 0, ',', '.') }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $product->preorder }} hari</div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-sm text-gray-500 italic">Belum ada produk.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Selamat Datang!',
                text: 'Anda berhasil login ke dashboard admin',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
            });
        });
    </script>
@endpush
