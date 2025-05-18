@extends('layouts.admin')

@section('title', 'Daftar Blog')

@section('content')
    <div class="mb-6 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-gray-800">Daftar Blog</h1>
        <a href="{{ route('blogs.create') }}"
            class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
            + Tambah Blog
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded shadow">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow rounded-lg overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead class="bg-gray-50 border-b text-gray-700 font-semibold">
                <tr>
                    <th class="px-5 py-3">Judul</th>
                    <th class="px-5 py-3">Slug</th>
                    <th class="px-5 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($blogs as $blog)
                    <tr>
                        <td class="px-5 py-3">{{ $blog->title }}</td>
                        <td class="px-5 py-3">{{ $blog->slug }}</td>
                        <td class="px-5 py-3 space-x-2">
                            <a href="{{ route('blogs.edit', $blog->id) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" class="inline-block"
                                onsubmit="return confirm('Yakin ingin menghapus blog ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-gray-500 py-4 italic">Belum ada blog.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $blogs->links() }}
    </div>
@endsection
