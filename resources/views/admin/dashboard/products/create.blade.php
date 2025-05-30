@extends('layouts.admin')

@section('title', 'Tambah Produk')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data"
            class="lg:col-span-2 bg-white p-6 rounded-lg shadow">
            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                {{-- Informasi Produk --}}
                <div>
                    <h2 class="text-lg font-semibold mb-4">Informasi Produk</h2>

                    {{-- Nama Produk --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Nama Produk</label>
                        <input type="text" name="name" value="{{ old('name') }}"
                            class="w-full border rounded px-3 py-2 @error('name') border-red-500 @enderror">
                        @error('name')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Preorder --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Preorder (hari)</label>
                        <input type="number" name="preorder" value="{{ old('preorder') }}"
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
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                        <input type="number" name="price" value="{{ old('price') }}"
                            class="w-full border rounded px-3 py-2 @error('price') border-red-500 @enderror"
                            placeholder="Rp">
                        @error('price')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Deskripsi</label>
                        <textarea name="description" rows="4"
                            class="w-full border rounded px-3 py-2 @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Gambar Produk --}}
                <div>
                    <h2 class="text-lg font-semibold mb-4">Gambar Produk</h2>

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Upload Gambar (maks. 5)</label>
                        <input type="file" name="images[]" multiple accept="image/*"
                            class="w-full border rounded px-3 py-2 @error('images.*') border-red-500 @enderror"
                            id="imageInput">
                        @error('images.*')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Preview --}}
                    <div id="preview-container" class="flex flex-wrap gap-3 mt-4"></div>
                    <div id="image-warning" class="text-sm text-red-600 mt-2 hidden">
                        Ukuran gambar melebihi 2MB.
                    </div>
                    <div id="format-error" class="text-sm text-red-600 mt-2 hidden">
                        Silahkan upload dengan format jpg, jpeg, png.
                    </div>
                    <div id="max-image-warning" class="text-sm text-red-600 mt-2 hidden">
                        Maksimal 5 gambar yang dapat diunggah.
                    </div>
                    <p class="text-sm text-gray-500 mt-2">Hanya maksimal 5 gambar yang dapat diunggah.</p>

                    {{-- Hidden Input untuk Gambar yang Dihapus --}}
                    <input type="hidden" id="deleted_images" name="deleted_images" value="">
                </div>
            </div>

            {{-- Tombol --}}
            <div class="text-right mt-6">
                <button type="reset" class="text-red-600 border border-red-500 px-4 py-2 rounded hover:bg-red-50 mr-2">
                    Batal
                </button>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/admin/products/product-create.js') }}"></script>
@endpush
