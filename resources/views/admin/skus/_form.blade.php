@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <ul class="mt-3 list-disc list-inside text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- ✅ DROPDOWN UNTUK MEMILIH PRODUK -->
<div class="mb-4">
    <label for="product_id" class="block text-sm font-medium text-gray-700 mb-1">Product</label>
    <select name="product_id" id="product_id"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
        required>
        <option value="">-- Select a Product --</option>
        @foreach ($products as $product)
            <option value="{{ $product->id }}" {{-- Tentukan produk yang terpilih saat edit --}} @if (old('product_id', $sku->product_id ?? '') == $product->id) selected @endif>
                {{ $product->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-4">
    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Variant Name (e.g., Red, Large)</label>
    {{-- ✅ Kode 'value' ini sudah benar, tidak perlu diubah --}}
    <input type="text" name="name" id="name" value="{{ old('name', $sku->name ?? '') }}"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
        required>
</div>

<div class="mb-6">
    <label for="sku" class="block text-sm font-medium text-gray-700 mb-1">SKU Code</label>
    <input type="text" name="sku" id="sku" value="{{ old('sku', $sku->sku ?? '') }}"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
        required>
</div>

<div class="flex items-center justify-end mt-4">
    <a href="{{ route('skus.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">Cancel</a>
    <button type="submit"
        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow transition">
        Save SKU
    </button>
</div>
