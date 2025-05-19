@extends('layouts.admin')

@section('title', 'Edit Blog')

@section('content')
    <div class="max-w-3xl mx-auto">
        <h1 class="text-2xl font-bold mb-6">Edit Blog</h1>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-600 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block font-medium text-gray-700">Judul</label>
                <input type="text" name="title" id="title" value="{{ old('title', $blog->title) }}"
                    class="w-full border rounded px-4 py-2 mt-1 focus:ring focus:ring-blue-300">
            </div>

            <div class="mb-4">
                <label for="content" class="block font-medium text-gray-700">Konten</label>
                <textarea name="content" id="content" rows="6"
                    class="w-full border rounded px-4 py-2 mt-1 focus:ring focus:ring-blue-300">{{ old('content', $blog->content) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="thumbnail" class="block font-medium text-gray-700">Thumbnail (Opsional)</label>
                <input type="file" name="thumbnail" id="thumbnail" class="w-full border rounded px-4 py-2 mt-1">

                @if ($blog->thumbnail)
                    <div class="mt-2">
                        <p class="text-sm text-gray-600">Gambar saat ini:</p>
                        <img src="{{ asset('storage/' . $blog->thumbnail) }}" alt="Thumbnail" class="h-32 mt-1">
                    </div>
                @endif
            </div>

            <div class="flex justify-end">
                <a href="{{ route('blogs.index') }}" class="mr-4 text-gray-600 hover:text-gray-800">Batal</a>
                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">Update</button>
            </div>
        </form>
    </div>
@endsection
