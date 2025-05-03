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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const input = document.getElementById('imageInput');
            const previewContainer = document.getElementById('preview-container');
            const deletedImageInput = document.getElementById('deleted_images');

            const warningText = document.getElementById('image-warning');
            const formatError = document.getElementById('format-error');
            const maxImageWarning = document.getElementById('max-image-warning');

            let selectedFiles = [];
            let deletedImageIds = [];

            input.addEventListener('change', function() {
                const newFiles = Array.from(this.files);
                let hasInvalidFile = false;
                let hasInvalidFormat = false;

                // Hitung jumlah total file termasuk yang baru
                const currentTotal = selectedFiles.length + previewContainer.querySelectorAll(
                    '[data-existing]').length;

                if (currentTotal + newFiles.length > 5) {
                    maxImageWarning.classList.remove('hidden');
                    input.value = '';
                    return;
                } else {
                    maxImageWarning.classList.add('hidden');
                }

                newFiles.forEach(file => {
                    const exists = selectedFiles.some(
                        f => f.name === file.name && f.lastModified === file.lastModified
                    );
                    const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];

                    if (!allowedTypes.includes(file.type)) {
                        hasInvalidFormat = true;
                        return;
                    }

                    if (file.size > 2 * 1024 * 1024) {
                        hasInvalidFile = true;
                        return;
                    }

                    if (!exists && selectedFiles.length < 5) {
                        selectedFiles.push(file);
                    }
                });

                this.value = '';
                renderPreviews();

                // Tampilkan/ Sembunyikan error
                warningText.classList.toggle('hidden', !hasInvalidFile);
                formatError.classList.toggle('hidden', !hasInvalidFormat);
            });

            function renderPreviews() {
                previewContainer.querySelectorAll('[data-new-preview="true"]').forEach(el => el.remove());

                selectedFiles.forEach((file, index) => {
                    const reader = new FileReader();
                    reader.onload = e => {
                        const wrapper = document.createElement('div');
                        wrapper.className = 'relative w-24 h-24 group';
                        wrapper.setAttribute('data-new-preview', 'true');

                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.className = 'w-full h-full object-cover rounded border';

                        const deleteBtn = document.createElement('button');
                        deleteBtn.innerHTML = '&times;';
                        deleteBtn.className =
                            'absolute top-1 right-1 bg-red-600 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs hover:bg-red-700';
                        deleteBtn.type = 'button';

                        deleteBtn.onclick = () => {
                            selectedFiles.splice(index, 1);
                            renderPreviews();
                        };

                        wrapper.appendChild(img);
                        wrapper.appendChild(deleteBtn);
                        previewContainer.appendChild(wrapper);
                    };
                    reader.readAsDataURL(file);
                });

                const dataTransfer = new DataTransfer();
                selectedFiles.forEach(file => dataTransfer.items.add(file));
                input.files = dataTransfer.files;
            }

            // Fungsi hapus gambar lama (DB)
            window.markImageForDeletion = function(imageId, buttonElement) {
                if (!deletedImageIds.includes(imageId)) {
                    deletedImageIds.push(imageId);
                }

                const wrapper = buttonElement.closest('[data-id]');
                if (wrapper) wrapper.remove();

                deletedImageInput.value = deletedImageIds.join(',');
            };
        });
    </script>
@endpush
