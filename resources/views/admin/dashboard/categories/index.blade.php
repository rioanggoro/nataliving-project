@extends('layouts.admin')

@section('title', 'Kategori Produk')

@section('content')

    {{-- Tombol tambah --}}
    <div class="flex items-center justify-between mb-6">
        <a href="{{ route('categories.create') }}"
            class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow transition">
            + Tambah Kategori
        </a>
    </div>

    {{-- Notifikasi sukses --}}
    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded shadow">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tabel kategori --}}
    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="w-full text-left text-sm">
            <thead class="bg-gray-50 border-b text-gray-700 font-semibold">
                <tr>
                    <th class="px-5 py-3 w-12">No</th>
                    <th class="px-5 py-3">Nama Kategori</th>
                    <th class="px-5 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($categories as $index => $category)
                    <tr class="hover:bg-gray-50">
                        <td class="px-5 py-3">{{ $index + 1 }}</td>
                        <td class="px-5 py-3">{{ $category->name }}</td>
                        <td class="px-5 py-3 text-center space-x-4">
                            {{-- Tombol Edit --}}
                            <a href="{{ route('categories.edit', $category->id) }}"
                                class="text-blue-600 hover:underline">Edit</a>

                            {{-- Tombol Hapus (Trigger Modal) --}}
                            <button data-modal-target="popup-modal-{{ $category->id }}"
                                data-modal-toggle="popup-modal-{{ $category->id }}" class="text-red-600 hover:underline">
                                Hapus
                            </button>

                        </td>
                        <x-modal.delete :id="'popup-modal-' . $category->id" :route="route('categories.destroy', $category->id)" :message="'Yakin ingin menghapus kategori \'' . $category->name . '\'?'" />
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-gray-500 py-4 italic">
                            Belum ada kategori.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $categories->links() }}
    </div>

@endsection
