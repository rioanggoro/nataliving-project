@extends('layouts.admin')

@section('title', 'Edit SKU')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Edit SKU: <span class="text-indigo-600">{{ $sku->name }}</span></h2>

    <div class="bg-white p-8 rounded-lg shadow-md">

        <form action="{{ route('admin.skus.update', $sku) }}" method="POST">
            @csrf
            @method('PUT')
            @include('admin.skus._form', ['sku' => $sku, 'products' => $products])
        </form>
    </div>
@endsection
