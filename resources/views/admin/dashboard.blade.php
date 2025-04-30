@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">

        <div class="bg-white shadow rounded-lg p-4">
            <p class="text-sm text-gray-500">Total Produk</p>
            <h2 class="text-xl font-bold text-blue-600">500</h2>
        </div>

        <div class="bg-white shadow rounded-lg p-4">
            <p class="text-sm text-gray-500">Total Kategori</p>
            <h2 class="text-xl font-bold text-green-600">500</h2>
        </div>

    </div>
@endsection
