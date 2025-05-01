@extends('layouts.admin')

@section('title', 'Edit Kategori')

@section('content')
    <div class="max-w-xl bg-white p-6 rounded shadow mx-auto">
        <h1 class="text-2xl font-bold mb-6">Edit Kategori</h1>

        <form method="POST" action="{{ route('categories.update', $category->id) }}">
            @csrf
            @method('PUT')

            {{-- Nama kategori --}}
            <div class="mb-4">
                <label class="block mb-1 font-medium">Nama Kategori</label>
                <input type="text" name="name" class="w-full border px-3 py-2 rounded"
                    value="{{ old('name', $category->name) }}" required>
            </div>

            {{-- Tombol submit --}}
            <div class="text-right">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection
