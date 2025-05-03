@extends('layouts.admin')

@section('title', 'Daftar Produk')

@section('content')
    {{-- Tombol tambah --}}
    <div class="flex items-center justify-between mb-6">
        <a href="{{ route('products.create') }}"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow transition">
            + Tambah Produk
        </a>
    </div>

    {{-- Notifikasi sukses --}}
    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded shadow">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tabel produk --}}
    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="w-full text-left text-sm">
            <thead class="bg-gray-100 border-b text-gray-700 font-semibold">
                <tr>
                    <th class="px-5 py-3">No</th>
                    <th class="px-5 py-3">Gambar</th>
                    <th class="px-5 py-3">Nama</th>
                    <th class="px-5 py-3">Kategori</th>
                    <th class="px-5 py-3">Harga</th>
                    <th class="px-5 py-3">Preorder</th>
                    <th class="px-5 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($products as $index => $product)
                    <tr class="hover:bg-gray-50">
                        <td class="px-5 py-3">{{ $index + 1 }}</td>
                        <td class="px-5 py-3">
                            @if ($product->mainImage)
                                <img src="{{ asset('storage/' . $product->mainImage->image_url) }}" alt="image"
                                    class="w-12 h-12 object-cover rounded">
                            @else
                                <span class="text-gray-400 italic">Tidak ada</span>
                            @endif
                        </td>
                        <td class="px-5 py-3">{{ $product->name }}</td>
                        <td class="px-5 py-3">{{ $product->category->name ?? '-' }}</td>
                        <td class="px-5 py-3">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td class="px-5 py-3">{{ $product->preorder }} hari</td>
                        <td class="px-5 py-3 text-center space-x-2">
                            <a href="{{ route('products.edit', $product->id) }}"
                                class="text-blue-600 hover:underline">Edit</a>
                            <!-- Tombol delete -->
                            <button data-modal-target="popup-modal-{{ $product->id }}"
                                data-modal-toggle="popup-modal-{{ $product->id }}"
                                class="text-red-600 hover:text-red-800">
                                Hapus
                            </button>
                        </td>
                        <x-modal.delete :id="'popup-modal-' . $product->id" :route="route('products.destroy', $product->id)"
                            message="Yakin ingin menghapus produk '{{ $product->name }}'?" />
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-gray-500 py-4 italic">
                            Belum ada produk.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-6">
        {{ $products->links() }}
    </div>
@endsection
