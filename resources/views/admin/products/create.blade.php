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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const input = document.getElementById('imageInput');
            const previewContainer = document.getElementById('preview-container');

            input.addEventListener('change', function() {
                const files = Array.from(this.files);

                // Mengecek jika total gambar yang dipilih (termasuk yang sebelumnya) lebih dari 5
                const currentPreviewCount = previewContainer.children.length;
                if (currentPreviewCount + files.length > 5) {
                    alert('Maksimal 5 gambar yang diperbolehkan.');
                    input.value = ''; // Menghapus input untuk menghindari pemilihan file lebih dari 5
                    return;
                }

                // Menambahkan gambar baru ke dalam preview
                files.forEach(file => {
                    if (!file.type.startsWith('image/')) return; // Hanya menerima file gambar

                    const reader = new FileReader();
                    reader.onload = e => {
                        const imgWrapper = document.createElement('div');
                        imgWrapper.classList.add('relative');
                        imgWrapper.setAttribute('data-id', Date
                    .now()); // Assign unique ID for this image

                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.className =
                            'w-24 h-24 object-cover rounded border shadow transition-transform transform hover:scale-105';

                        // Create delete button
                        const deleteButton = document.createElement('button');
                        deleteButton.className =
                            'absolute top-0 right-0 bg-red-600 text-white p-1 rounded-full';
                        deleteButton.innerHTML = '&times;';
                        deleteButton.onclick = () => markImageForDeletion(imgWrapper);

                        // Add elements to the wrapper
                        imgWrapper.appendChild(img);
                        imgWrapper.appendChild(deleteButton);
                        previewContainer.appendChild(imgWrapper);
                    };
                    reader.readAsDataURL(file); // Membaca file gambar
                });
            });

            // Reset preview saat form direset
            document.querySelector('form').addEventListener('reset', () => {
                previewContainer.innerHTML = ''; // Menghapus semua gambar yang ada di preview
            });
        });

        const deletedImageIds = [];

        function markImageForDeletion(imageWrapper) {
            // Tambahkan ID ke list yang akan dihapus
            const imageId = imageWrapper.getAttribute('data-id');
            if (!deletedImageIds.includes(imageId)) {
                deletedImageIds.push(imageId);
            }

            // Sembunyikan/Remove image preview dari UI
            imageWrapper.remove();

            // Update hidden input
            document.getElementById('deleted_images').value = deletedImageIds.join(',');
        }
    </script>
@endpush
