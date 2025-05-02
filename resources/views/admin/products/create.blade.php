@extends('layouts.admin')

@section('title', 'Tambah Produk')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        {{-- Informasi Produk --}}
        <div class="bg-white p-6 rounded-lg shadow-lg shadow-gray-500">
            <h2 class="text-lg font-semibold mb-4">Informasi Produk</h2>
            <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                @csrf

                {{-- Nama Produk --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Nama Produk</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="w-full border rounded px-3 py-2 @error('name') border-red-500 @enderror">
                    @error('name')
                        <p class="text-red-600 text-sm mt-1">Kolom ini belum diisi.</p>
                    @enderror
                </div>

                {{-- Preorder --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Preorder (hari)</label>
                    <input type="number" name="preorder" value="{{ old('preorder') }}"
                        class="w-full border rounded px-3 py-2 @error('preorder') border-red-500 @enderror"
                        placeholder="Contoh: 14">
                    @error('preorder')
                        <p class="text-red-600 text-sm mt-1">Kolom ini belum diisi.</p>
                    @enderror
                </div>

                {{-- Kategori --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Kategori</label>
                    <select name="category_id"
                        class="w-full border rounded px-3 py-2 @error('category_id') border-red-500 @enderror">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-red-600 text-sm mt-1">Kolom ini belum diisi.</p>
                    @enderror
                </div>

                {{-- Harga --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Harga</label>
                    <input type="number" name="price" value="{{ old('price') }}"
                        class="w-full border rounded px-3 py-2 @error('price') border-red-500 @enderror" placeholder="Rp">
                    @error('price')
                        <p class="text-red-600 text-sm mt-1">Kolom ini belum diisi.</p>
                    @enderror
                </div>

                {{-- Deskripsi --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Deskripsi</label>
                    <textarea name="description" rows="4"
                        class="w-full border rounded px-3 py-2 @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-600 text-sm mt-1">Kolom ini belum diisi.</p>
                    @enderror
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
        <div class="bg-white p-6 rounded-lg shadow-lg shadow-gray-500">
            <h2 class="text-lg font-semibold mb-4">Gambar Produk</h2>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Upload Gambar</label>
                <input type="file" name="image"
                    class="w-full border rounded px-3 py-2 @error('image') border-red-500 @enderror">
                @error('image')
                    <p class="text-red-600 text-sm mt-1">Gambar belum diunggah.</p>
                @enderror
            </div>

            <div class="flex flex-wrap gap-4 mt-2">
                <div class="w-32 h-32 bg-gray-100 flex items-center justify-center rounded text-gray-400">
                    No Preview
                </div>
            </div>

            <p class="text-sm text-gray-500 mt-2">Hanya satu gambar akan digunakan saat ini.</p>
        </div>
    </div>
@endsection
