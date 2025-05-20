@extends('layouts.admin')

@section('title', 'Manajemen Blog')

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
@endpush

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-xl font-bold">Daftar Blog</h1>
        <a href="{{ route('blogs.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">+ Tambah</a>
    </div>

    @if (session('success'))
        <div class="mb-4 text-green-600">{{ session('success') }}</div>
    @endif

    <div class="bg-white rounded shadow overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-gray-100 text-sm text-gray-700 uppercase">
                <tr>
                    <th class="p-4">No</th>
                    <th class="p-4">Gambar</th>
                    <th class="p-4">Judul</th>
                    <th class="p-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($blogs as $index => $blog)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="p-4">{{ $index + 1 }}</td>
                        <td class="p-4">
                            @if ($blog->thumbnail)
                                <img src="{{ asset('storage/' . $blog->thumbnail) }}" alt="Thumbnail"
                                    class="w-16 h-16 object-cover rounded">
                            @else
                                <div
                                    class="w-16 h-16 bg-gray-200 flex items-center justify-center text-gray-400 text-xs rounded">
                                    Tidak ada
                                </div>
                            @endif
                        </td>
                        <td class="p-4 font-medium text-gray-900">{{ $blog->title }}</td>
                        <td class="p-4 space-x-2">
                            <a href="{{ route('blogs.edit', $blog->id) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" class="inline delete-form">
                                @csrf 
                                @method('DELETE')
                                <button type="button" onclick="confirmDelete(this.form)" class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="p-4 text-center text-gray-500">Belum ada blog ditambahkan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(form) {
            Swal.fire({
                title: 'Hapus Blog?',
                text: "Blog yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#EF4444',
                cancelButtonColor: '#6B7280',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Show loading state
                    Swal.fire({
                        title: 'Menghapus...',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        showConfirmButton: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                    form.submit();
                }
            });
        }

        // Tampilkan SweetAlert2 jika ada session success
        @if(session('success'))
            Swal.fire({
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonColor: '#4F46E5'
            });
        @endif
    </script>
@endpush
