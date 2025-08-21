@extends('layouts.admin')

@section('title', 'Add New SKU')

@section('content')

    <h2 class="text-2xl font-bold mb-6">Add New SKU</h2>

    <div class="bg-white p-8 rounded-lg shadow-md">
        {{-- ✅ Action form diperbaiki ke route yang benar --}}
        <form action="{{ route('admin.skus.store') }}" method="POST">
            @csrf
            @include('admin.skus._form')
        </form>
    </div>
@endsection
