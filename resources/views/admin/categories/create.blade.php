@extends('layouts.admin')

@section('title', 'Tambah Kategori')

@section('content')
    <div class="max-w-xl bg-white p-6 rounded shadow mx-auto">
        <h1 class="text-2xl font-bold mb-6">Tambah Kategori</h1>

        <form method="POST" action="{{ route('categories.store') }}">
            @csrf

            {{-- Nama kategori --}}
            <div class="mb-4">
                <label class="block mb-1 font-medium">Nama Kategori</label>
                <input type="text" name="name" class="w-full border px-3 py-2 rounded" value="{{ old('name') }}"
                    required>
            </div>

            {{-- Induk kategori --}}
            <div class="mb-4">
                <label class="block mb-1 font-medium">Induk Kategori (Opsional)</label>
                <select name="parent_id" class="w-full border px-3 py-2 rounded">
                    <option value="">-- Tanpa Induk --</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}" {{ old('parent_id') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Tombol submit --}}
            <div class="text-right">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection
