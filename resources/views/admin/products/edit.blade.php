@extends('layouts.admin')

@section('title', 'Edit Produk')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data"
            class="lg:col-span-2 bg-white p-6 rounded-lg shadow-lg shadow-gray-500">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                {{-- Informasi Produk --}}
                <div>
                    <h2 class="text-lg font-semibold mb-4">Informasi Produk</h2>

                    {{-- Nama Produk --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Nama Produk</label>
                        <input type="text" name="name" value="{{ old('name', $product->name) }}"
                            class="w-full border rounded px-3 py-2 @error('name') border-red-500 @enderror">
                        @error('name')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Preorder --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Preorder (hari)</label>
                        <input type="number" name="preorder" value="{{ old('preorder', $product->preorder) }}"
                            class="w-full border rounded px-3 py-2 @error('preorder') border-red-500 @enderror"
                            placeholder="Contoh: 14">
                        @error('preorder')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Kategori --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Kategori</label>
                        <select name="category_id"
                            class="w-full border rounded px-3 py-2 @error('category_id') border-red-500 @enderror">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Harga --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Harga</label>
                        <input type="number" name="price" value="{{ old('price', $product->price) }}"
                            class="w-full border rounded px-3 py-2 @error('price') border-red-500 @enderror">
                        @error('price')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Deskripsi</label>
                        <textarea name="description" rows="4"
                            class="w-full border rounded px-3 py-2 @error('description') border-red-500 @enderror">{{ old('description', $product->description) }}</textarea>
                        @error('description')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Gambar Produk --}}
                <div>
                    <h2 class="text-lg font-semibold mb-4">Gambar Produk</h2>

                    {{-- Upload Gambar --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Upload Gambar Baru</label>
                        <input type="file" name="image" accept="image/*"
                            class="w-full border px-3 py-2 rounded @error('image') border-red-500 @enderror">
                        @error('image')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Gambar Sebelumnya --}}
                    @if ($product->mainImage)
                        <div class="mt-4">
                            <label class="block text-sm font-medium mb-1">Gambar Saat Ini</label>
                            <img src="{{ asset('storage/' . $product->mainImage->image_url) }}"
                                class="w-32 h-32 object-cover rounded border" alt="Gambar Sekarang">
                        </div>
                    @endif
                </div>
            </div>

            {{-- Tombol --}}
            <div class="text-right mt-6">
                <a href="{{ route('products.index') }}"
                    class="border border-gray-300 text-gray-600 px-4 py-2 rounded hover:bg-gray-50 mr-2">Batal</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection
