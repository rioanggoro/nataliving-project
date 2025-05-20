@extends('layouts.admin')

@section('title', 'Tambah Blog')

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
@endpush

@section('content')
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-sm">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">📝 Tambah Blog Baru</h1>

        {{-- Error Message --}}
        @if ($errors->any())
            <div class="mb-6 bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li class="mb-1">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form --}}
        <form id="createBlogForm" action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            {{-- Judul --}}
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul Blog</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required>
            </div>

            {{-- Thumbnail --}}
            <div>
                <label for="thumbnail" class="block text-sm font-medium text-gray-700 mb-1">Upload Thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail" accept="image/*"
                    class="block w-full text-sm text-gray-500
                        file:mr-4 file:py-2 file:px-4
                        file:rounded-md file:border-0
                        file:text-sm file:font-semibold
                        file:bg-indigo-50 file:text-indigo-700
                        hover:file:bg-indigo-100" 
                    onchange="previewImage()" />
                
                {{-- Preview Container --}}
                <div id="imagePreview" class="hidden mt-4">
                    <div class="relative w-full max-w-[300px]">
                        <img id="preview" src="#" alt="Preview" class="w-full h-auto rounded-lg shadow-sm">
                        <button type="button" onclick="removeImage()" 
                            class="absolute top-2 right-2 bg-red-500 text-white rounded-full p-1 hover:bg-red-600 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Konten --}}
            <div>
                <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Isi Konten</label>
                <input id="content" type="hidden" name="content" value="{{ old('content') }}">
                <trix-editor input="content"
                    class="trix-content bg-white border border-gray-300 rounded-lg px-4 py-2 min-h-[200px] focus:outline-none focus:ring-2 focus:ring-indigo-500"></trix-editor>
            </div>

            {{-- Tombol --}}
            <div class="flex justify-end pt-4">
                <a href="{{ route('blogs.index') }}"
                    class="inline-flex items-center bg-gray-100 hover:bg-gray-200 text-gray-800 px-4 py-2 rounded-lg mr-2 transition">
                    Batal
                </a>
                <button type="submit"
                    class="inline-flex items-center bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Form submission dengan SweetAlert2
        document.getElementById('createBlogForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            Swal.fire({
                title: 'Simpan Blog?',
                text: "Pastikan semua data sudah benar",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#4F46E5',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Simpan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Show loading state
                    Swal.fire({
                        title: 'Menyimpan...',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        showConfirmButton: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    // Submit form
                    this.submit();
                }
            });
        });

        // Tampilkan SweetAlert2 jika ada session success
        @if(session('success'))
            Swal.fire({
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonColor: '#4F46E5'
            });
        @endif

        // Preview Image Function
        function previewImage() {
            const preview = document.getElementById('preview');
            const previewContainer = document.getElementById('imagePreview');
            const file = document.getElementById('thumbnail').files[0];
            const reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
                previewContainer.classList.remove('hidden');
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
                previewContainer.classList.add('hidden');
            }
        }

        // Remove Image Function
        function removeImage() {
            document.getElementById('thumbnail').value = '';
            document.getElementById('imagePreview').classList.add('hidden');
            document.getElementById('preview').src = '';
        }

        // Konfigurasi untuk upload gambar di Trix Editor
        document.addEventListener('trix-attachment-add', function(event) {
            var attachment = event.attachment;
            
            if (attachment.file) {
                uploadTrixImage(attachment);
            }
        });

        function uploadTrixImage(attachment) {
            // Buat form data untuk upload
            var formData = new FormData();
            formData.append('file', attachment.file);
            
            // Tampilkan progress bar
            attachment.setUploadProgress(0);
            
            // Gunakan XMLHttpRequest sebagai alternatif fetch
            var xhr = new XMLHttpRequest();
            
            xhr.open('POST', '{{ route('trix.upload') }}', true);
            xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
            
            xhr.upload.onprogress = function(event) {
                var progress = event.loaded / event.total * 100;
                attachment.setUploadProgress(progress);
            };
            
            xhr.onload = function() {
                if (xhr.status === 200) {
                    try {
                        var response = JSON.parse(xhr.responseText);
                        attachment.setAttributes({
                            url: response.url,
                            href: response.url
                        });
                        attachment.setUploadProgress(100);
                    } catch (e) {
                        console.error('Error parsing JSON:', e);
                        console.log('Response text:', xhr.responseText);
                        attachment.remove();
                        alert('Upload gambar gagal. Silakan coba lagi.');
                    }
                } else {
                    console.error('Error:', xhr.statusText);
                    console.log('Response text:', xhr.responseText);
                    attachment.remove();
                    alert('Upload gambar gagal. Silakan coba lagi.');
                }
            };
            
            xhr.onerror = function() {
                console.error('Network Error');
                attachment.remove();
                alert('Upload gambar gagal. Silakan coba lagi.');
            };
            
            xhr.send(formData);
        }
    </script>
@endpush
