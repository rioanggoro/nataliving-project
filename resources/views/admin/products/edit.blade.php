@extends('layouts.admin')

@section('title', 'Edit Produk')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        {{-- Informasi Produk --}}
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-lg font-semibold mb-4">Edit Produk</h2>

            <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Nama Produk</label>
                    <input type="text" name="name" value="{{ old('name', $product->name) }}"
                        class="w-full border rounded px-3 py-2" required>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Preorder (hari)</label>
                    <input type="number" name="preorder" value="{{ old('preorder', $product->preorder) }}"
                        class="w-full border rounded px-3 py-2" placeholder="Contoh: 14" required>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Kategori</label>
                    <select name="category_id" class="w-full border rounded px-3 py-2" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Harga</label>
                    <input type="number" name="price" value="{{ old('price', $product->price) }}"
                        class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Deskripsi</label>
                    <textarea name="description" rows="4" class="w-full border rounded px-3 py-2">{{ old('description', $product->description) }}</textarea>
                </div>

                <div class="text-right mt-6">
                    <a href="{{ route('products.index') }}"
                        class="border border-gray-300 text-gray-600 px-4 py-2 rounded hover:bg-gray-50 mr-2">Batal</a>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Update
                    </button>
                </div>
            </form>
        </div>

        {{-- Gambar Produk --}}
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-lg font-semibold mb-4">Gambar Produk</h2>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Upload Gambar Baru</label>
                <input type="file" name="image" accept="image/*"
                    class="w-full border px-3 py-2 rounded bg-white file:mr-3 file:py-1 file:px-3 file:border-0 file:text-sm file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
            </div>

            @if ($product->mainImage)
                <div class="mt-4">
                    <label class="block text-sm font-medium mb-1">Gambar Sekarang</label>
                    <img src="{{ asset('storage/' . $product->mainImage->image_url) }}"
                        class="w-32 h-32 object-cover rounded border" alt="Current Image">
                </div>
            @endif
        </div>
    </div>
@endsection
