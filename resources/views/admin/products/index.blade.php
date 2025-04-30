@extends('layouts.admin')

@section('title', 'Daftar Produk')

@section('content')
    <div class="flex items-center justify-between mb-6 bg-red-500">
        <a href="{{ route('products.create') }}"
            class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow transition">
            + Tambah Produk
        </a>

    </div>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded shadow">
            {{ session('success') }}
        </div>
    @endif

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
                @empty
                    <tr>
                        <td colspan="6" class="px-5 py-4 text-center text-gray-500 italic">
                            Belum ada produk.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $products->links() }}
    </div>
@endsection
