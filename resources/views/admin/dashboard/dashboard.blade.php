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
                <span class="text-3xl font-bold text-blue-600">500</span>
                <span class="text-sm text-green-500 mt-1">+12% dari bulan lalu</span>
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
                <span class="text-3xl font-bold text-green-600">500</span>
                <span class="text-sm text-green-500 mt-1">+5% dari bulan lalu</span>
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
                                Gambar</th>
                            <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama Produk</th>
                            <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Kategori</th>
                            <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Harga</th>
                            <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Stok</th>
                            <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status</th>
                            <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Produk 1 -->
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div
                                    class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center overflow-hidden">
                                    <i data-lucide="image" class="h-6 w-6 text-gray-400"></i>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">Sofa Minimalis 3 Seater</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">Sofa</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">Rp 5.999.000</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">45</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Aktif
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <a href="#" class="text-blue-600 hover:text-blue-900 mr-3">
                                    <i data-lucide="eye" class="h-4 w-4"></i>
                                </a>
                                <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-3">
                                    <i data-lucide="edit" class="h-4 w-4"></i>
                                </a>
                            </td>
                        </tr>

                        <!-- Produk 2 -->
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div
                                    class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center overflow-hidden">
                                    <i data-lucide="image" class="h-6 w-6 text-gray-400"></i>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">Meja Makan Kayu Jati</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">Meja</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">Rp 8.500.000</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">12</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Aktif
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <a href="#" class="text-blue-600 hover:text-blue-900 mr-3">
                                    <i data-lucide="eye" class="h-4 w-4"></i>
                                </a>
                                <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-3">
                                    <i data-lucide="edit" class="h-4 w-4"></i>
                                </a>
                            </td>
                        </tr>

                        <!-- Produk 3 -->
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div
                                    class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center overflow-hidden">
                                    <i data-lucide="image" class="h-6 w-6 text-gray-400"></i>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">Lemari Pakaian Sliding</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">Lemari</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">Rp 4.899.000</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">18</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Aktif
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <a href="#" class="text-blue-600 hover:text-blue-900 mr-3">
                                    <i data-lucide="eye" class="h-4 w-4"></i>
                                </a>
                                <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-3">
                                    <i data-lucide="edit" class="h-4 w-4"></i>
                                </a>
                            </td>
                        </tr>

                        <!-- Produk 4 -->
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div
                                    class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center overflow-hidden">
                                    <i data-lucide="image" class="h-6 w-6 text-gray-400"></i>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">Kursi Kantor Ergonomis</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">Kursi</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">Rp 1.299.000</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">23</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Terbatas
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <a href="#" class="text-blue-600 hover:text-blue-900 mr-3">
                                    <i data-lucide="eye" class="h-4 w-4"></i>
                                </a>
                                <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-3">
                                    <i data-lucide="edit" class="h-4 w-4"></i>
                                </a>
                            </td>
                        </tr>

                        <!-- Produk 5 -->
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div
                                    class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center overflow-hidden">
                                    <i data-lucide="image" class="h-6 w-6 text-gray-400"></i>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">Rak Buku Minimalis</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">Rak</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">Rp 899.000</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">56</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Aktif
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <a href="#" class="text-blue-600 hover:text-blue-900 mr-3">
                                    <i data-lucide="eye" class="h-4 w-4"></i>
                                </a>
                                <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-3">
                                    <i data-lucide="edit" class="h-4 w-4"></i>
                                </a>
                            </td>
                        </tr>
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
