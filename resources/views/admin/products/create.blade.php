@extends('layouts.admin')

@section('title', 'Tambah Produk')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        {{-- Informasi Produk --}}
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-lg font-semibold mb-4">Informasi Produk</h2>
            <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Nama Produk</label>
                    <input type="text" name="name" class="w-full border rounded px-3 py-2" required>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Preorder (hari)</label>
                    <input type="number" name="preorder" class="w-full border rounded px-3 py-2" placeholder="Contoh: 14"
                        required>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Kategori</label>
                    <select name="category_id" class="w-full border rounded px-3 py-2" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Harga</label>
                    <input type="number" name="price" class="w-full border rounded px-3 py-2" placeholder="Rp" required>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Deskripsi</label>
                    <textarea name="description" rows="4" class="w-full border rounded px-3 py-2"></textarea>
                </div>

                <div class="text-right mt-6">
                    <button type="reset"
                        class="text-red-600 border border-red-500 px-4 py-2 rounded hover:bg-red-50 mr-2">
                        Batal
                    </button>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Simpan
                    </button>
                </div>
            </form>
        </div>

        {{-- Gambar Produk --}}
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-lg font-semibold mb-4">Gambar Produk</h2>
            <div class="flex flex-wrap gap-4 mb-4">
                <label
                    class="flex flex-col items-center justify-center w-32 h-32 border-2 border-dashed rounded cursor-pointer">
                    <span class="text-sm text-gray-500">Tambah</span>
                    <input type="file" name="image" class="hidden">
                </label>
                <div class="w-32 h-32 bg-gray-100 flex items-center justify-center rounded text-gray-400">
                    No Image
                </div>
            </div>
            <p class="text-sm text-gray-500">Hanya satu gambar akan digunakan saat ini.</p>
        </div>

    </div>
@endsection
