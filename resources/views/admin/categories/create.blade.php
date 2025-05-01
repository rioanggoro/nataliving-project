@extends('layouts.admin')

@section('title', 'Tambah Kategori')

@section('content')
    <div class="max-w-xl bg-white p-6 rounded shadow mx-auto">
        <h1 class="text-2xl font-bold mb-6">Tambah Kategori</h1>

        <form method="POST" action="{{ route('categories.store') }}">
            @csrf

            {{-- Nama kategori --}}
            <div class="mb-4">
                <label for="name" class="block mb-1 font-medium">Nama Kategori</label>
                <input type="text" name="name" id="name"
                    class="w-full border px-3 py-2 rounded @error('name') border-red-500 @enderror"
                    value="{{ old('name') }}" required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tombol submit --}}
            <div class="text-right">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection
