@extends('layouts.admin')

@section('title', 'Tambah Produk')

@section('content')
    <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block font-semibold mb-1">Nama Produk</label>
                <input type="text" name="name" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Slug</label>
                <input type="text" name="slug" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Preorder (hari)</label>
                <input type="number" name="preorder" class="w-full border rounded px-3 py-2" placeholder="Contoh: 14"
                    required>
            </div>


            <div class="mb-4">
                <label class="block font-semibold mb-1">Kategori</label>
                <select name="category_id" class="w-full border rounded px-3 py-2" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Harga</label>
                <input type="number" name="price" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Deskripsi</label>
                <textarea name="description" class="w-full border rounded px-3 py-2" rows="4"></textarea>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Gambar</label>
                <input type="file" name="image" class="block w-full border rounded px-3 py-2">
            </div>

            <div class="text-right">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection
