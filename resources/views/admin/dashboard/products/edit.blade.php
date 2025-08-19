@extends('layouts.admin')

@section('title', 'Edit Produk')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data"
            class="lg:col-span-2 bg-white p-6 rounded-lg shadow">
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
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">Rp</span>
                            <input type="text" name="price"
                                value="{{ old('price', number_format($product->price, 0, ',', '.')) }}"
                                class="w-full border rounded px-3 py-2 pl-10 @error('price') border-red-500 @enderror"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                placeholder="Contoh: 100.000">
                        </div>
                        @error('price')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <script>
                        document.querySelector('input[name="price"]').addEventListener('input', function(e) {
                            let value = e.target.value.replace(/\D/g, '');
                            if (value) {
                                e.target.value = parseInt(value).toLocaleString('id-ID');
                            } else {
                                e.target.value = '';
                            }
                        });
                    </script>

                    {{-- Deskripsi --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Deskripsi</label>
                        <trix-editor input="content"
                            class="trix-content bg-white border border-gray-300 rounded-lg px-4 py-2 min-h-[200px] focus:outline-none focus:ring-2 focus:ring-indigo-500"></trix-editor>
                        @error('description')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Gambar Produk --}}
                <div>
                    <h2 class="text-lg font-semibold mb-4">Gambar Produk</h2>

                    {{-- Upload Baru --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Upload Gambar Baru <span
                                class="text-red-600 font-bold">(max 5 gambar)</span></label>
                        <input type="file" name="images[]" multiple accept="image/*" id="imageInput"
                            class="w-full border rounded px-3 py-2 @error('images.*') border-red-500 @enderror">
                        @error('images.*')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- Gambar Preview (Lama & Baru) --}}
                    <div id="preview-container" class="flex flex-wrap gap-3 mt-2">
                        @foreach ($product->images as $image)
                            <div class="relative w-24 h-24 group" data-id="{{ $image->id }}" data-existing="true">
                                <img src="{{ asset('storage/' . $image->image_url) }}"
                                    class="w-full h-full object-cover rounded border">
                                <button type="button" class="absolute top-0 right-0 bg-red-600 text-white p-1 rounded-full"
                                    onclick="markImageForDeletion({{ $image->id }}, this)">×</button>
                            </div>
                        @endforeach
                    </div>
                    <div id="image-warning" class="text-sm text-red-600 mt-2 hidden">
                        Ukuran gambar melebihi 2MB.
                    </div>
                    <div id="format-error" class="text-sm text-red-600 mt-2 hidden">
                        Silakan upload gambar dengan format jpg, jpeg, atau png.
                    </div>
                    <div id="max-image-warning" class="text-sm text-red-600 mt-2 hidden">
                        Maksimal 5 gambar yang dapat diunggah.
                    </div>
                    <p class="text-sm text-gray-500 mt-2">Jika tidak mengunggah gambar baru, gambar lama akan tetap
                        digunakan.</p>

                    {{-- Hidden Input untuk Gambar yang Dihapus --}}
                    <input type="hidden" id="deleted_images" name="deleted_images" value="">
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

@push('scripts')
    <script src="{{ asset('js/admin/products/product-edit.js') }}"></script>
@endpush
