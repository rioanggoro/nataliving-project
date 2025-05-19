@extends('layouts.admin')

@section('title', 'Manajemen Blog')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-xl font-bold">Daftar Blog</h1>
        <a href="{{ route('blogs.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">+ Tambah</a>
    </div>

    @if (session('success'))
        <div class="mb-4 text-green-600">{{ session('success') }}</div>
    @endif

    <div class="bg-white rounded shadow">
        <table class="w-full text-left">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-4">Judul</th>
                    <th class="p-4">Slug</th>
                    <th class="p-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                    <tr class="border-t">
                        <td class="p-4">{{ $blog->title }}</td>
                        <td class="p-4">{{ $blog->slug }}</td>
                        <td class="p-4 space-x-2">
                            <a href="{{ route('blogs.edit', $blog->id) }}" class="text-blue-600">Edit</a>
                            <form method="POST" action="{{ route('blogs.destroy', $blog->id) }}" class="inline">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Yakin hapus?')" class="text-red-600">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
