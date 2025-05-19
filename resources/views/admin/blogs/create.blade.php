@extends('layouts.admin')

@section('title', 'Tambah Blog')

@section('content')
    <div class="max-w-3xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Blog Baru</h1>

        @if ($errors->any())
            <div class="mb-4 bg-red-100 text-red-700 p-4 rounded">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Judul --}}
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul Blog</label>
                <input type="text" name="title" id="title"
                    class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    value="{{ old('title') }}" required>
            </div>

            {{-- Thumbnail --}}
            <div class="mb-4">
                <label for="thumbnail" class="block text-sm font-medium text-gray-700 mb-1">Thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail"
                    class="block w-full text-sm text-gray-500
                        file:mr-4 file:py-2 file:px-4
                        file:rounded file:border-0
                        file:text-sm file:font-semibold
                        file:bg-indigo-50 file:text-indigo-700
                        hover:file:bg-indigo-100" />
            </div>
            {{-- Konten --}}
            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Isi Konten</label>
                <textarea name="content" id="content" rows="6"
                    class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required>{{ old('content') }}</textarea>
            </div>

            {{-- Tombol --}}
            <div class="flex justify-end">
                <a href="{{ route('blogs.index') }}"
                    class="bg-gray-100 hover:bg-gray-200 text-gray-800 px-4 py-2 rounded mr-2">Batal</a>
                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded">Simpan</button>
            </div>
        </form>
    </div>
@endsection
