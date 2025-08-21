@extends('layouts.admin')

@section('title', 'Tambah Kategori')

@section('content')
    <div class="max-w-xl bg-white p-6 rounded shadow mx-auto">
        <h1 class="text-2xl font-bold mb-6">Tambah Kategori</h1>

        <form method="POST" action="{{ route('admin.categories.store') }}">
            @csrf

            {{-- Nama kategori --}}
            <div class="mb-4">
                <label for="name" class="block mb-1 font-medium">Nama Kategori</label>
                <input type="text" name="name" value="{{ old('name') }}"
                    class="w-full border rounded px-3 py-2 @error('name') border-red-500 @enderror">
                @error('name')
                    <p class="text-red-600 text-sm mt-1">Kolom ini belum diisi.</p>
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
