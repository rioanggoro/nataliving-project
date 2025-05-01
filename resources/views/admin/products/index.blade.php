@extends('layouts.admin')

@section('title', 'Daftar Produk')

@section('content')

    {{-- Tombol tambah --}}
    <div class="flex items-center justify-between mb-6">
        <a href="{{ route('products.create') }}"
            class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow transition">
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
            <thead class="bg-gray-50 border-b text-gray-700 font-semibold">
                <tr>
                    <th class="px-5 py-3">No</th>
                    <th class="px-5 py-3">Gambar</th>
                    <th class="px-5 py-3">Nama</th>
                    <th class="px-5 py-3">Kategori</th>
                    <th class="px-5 py-3">Harga</th>
                    <th class="px-5 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y">

                {{-- Loop produk --}}
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
                        <td class="px-5 py-3 space-x-2">
                            <a href="{{ route('products.edit', $product->id) }}"
                                class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline-block"
                                onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>

                    {{-- Produk dummy jika kosong --}}
                @empty
                    <tr class="hover:bg-gray-50">
                        <td class="px-5 py-3">1</td>
                        <td class="px-5 py-3">
                            <img src="https://cdn.ruparupa.io/fit-in/400x400/filters:format(webp)/filters:quality(90)/ruparupa-com/image/upload/Products/10472858_1.jpg"
                                alt="dummy" class="w-12 h-12 object-cover rounded">
                        </td>
                        <td class="px-5 py-3">Produk Dummy</td>
                        <td class="px-5 py-3">Kategori Contoh</td>
                        <td class="px-5 py-3">Rp 99.000</td>
                        <td class="px-5 py-3 space-x-2 text-sm">
                            <a href="{{ route('products.edit', 1) }}" class="text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('products.destroy', 1) }}" method="POST" class="inline-block"
                                onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $products->links() }}
    </div>
@endsection
