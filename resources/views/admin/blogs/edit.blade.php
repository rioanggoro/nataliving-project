@extends('layouts.admin')

@section('title', 'Edit Blog')

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
@endpush

@section('content')
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-sm">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">✏️ Edit Blog</h1>

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
        <form id="editBlogForm" action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- Judul --}}
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul Blog</label>
                <input type="text" name="title" id="title" value="{{ old('title', $blog->title) }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required>
            </div>

            {{-- Thumbnail --}}
            <div>
                <label for="thumbnail" class="block text-sm font-medium text-gray-700 mb-1">Upload Thumbnail
                    (Opsional)</label>
                <input type="file" name="thumbnail" id="thumbnail"
                    class="block w-full text-sm text-gray-500
                        file:mr-4 file:py-2 file:px-4
                        file:rounded-md file:border-0
                        file:text-sm file:font-semibold
                        file:bg-indigo-50 file:text-indigo-700
                        hover:file:bg-indigo-100" 
                    onchange="previewImage()" />

                <div class="mt-2">
                    <p class="text-sm text-gray-600">Gambar saat ini:</p>
                    <img id="thumbnail-preview" src="{{ $blog->thumbnail ? asset('storage/' . $blog->thumbnail) : '' }}" 
                        alt="Thumbnail" class="h-32 mt-1 rounded {{ $blog->thumbnail ? '' : 'hidden' }}">
                </div>
            </div>

            {{-- Konten --}}
            <div>
                <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Isi Konten</label>
                <input id="content" type="hidden" name="content" value="{{ old('content', $blog->content) }}">
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
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Form submission dengan SweetAlert2
        document.getElementById('editBlogForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            Swal.fire({
                title: 'Update Blog?',
                text: "Pastikan semua perubahan sudah benar",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#4F46E5',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Update!',
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

        function previewImage() {
            const input = document.getElementById('thumbnail');
            const preview = document.getElementById('thumbnail-preview');
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush
