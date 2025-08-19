@extends('layouts.admin')

@section('title', 'Manage All SKUs')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Manage All SKUs</h2>
        <a href="{{ route('skus.create') }}"
            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow-md transition">
            + Add New SKU
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SKU Code</th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Variant Name
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                    <th scope="col"
                        class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($skus as $sku)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap font-mono">{{ $sku->sku }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $sku->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $sku->product->name ?? 'N/A' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('skus.edit', $sku) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            <button data-modal-target="popup-modal-{{ $sku->id }}"
                                data-modal-toggle="popup-modal-{{ $sku->id }}" type="button"
                                class="text-red-600 hover:text-red-900 ml-4">
                                Delete
                            </button>
                        </td>
                        <x-modal.delete :id="'popup-modal-' . $sku->id" :route="route('skus.destroy', $sku)" :message="'Yakin ingin menghapus SKU \'' . $sku->name . '\'?'" />
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 whitespace-nowrap text-center text-gray-500">No SKUs found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $skus->links() }}
    </div>
@endsection
