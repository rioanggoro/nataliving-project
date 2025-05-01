@extends('layouts.admin')

@section('title', 'Edit Produk')

@section('content')
    <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-6">Edit Produk</h1>

        <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-semibold mb-1">Nama Produk</label>
                <input type="text" name="name" value="{{ old('name', $product->name) }}"
                    class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Slug</label>
                <input type="text" name="slug" value="{{ old('slug', $product->slug) }}"
                    class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Kategori</label>
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
                <label class="block font-semibold mb-1">Harga</label>
                <input type="number" name="price" value="{{ old('price', $product->price) }}"
                    class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Deskripsi</label>
                <textarea name="description" class="w-full border rounded px-3 py-2" rows="4">{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Gambar Baru (Opsional)</label>
                <input type="file" name="image" accept="image/*">
                @if ($product->mainImage)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $product->mainImage->image_url) }}"
                            class="w-16 h-16 object-cover rounded" alt="Current Image">
                    </div>
                @endif
            </div>

            <div class="text-right">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection
