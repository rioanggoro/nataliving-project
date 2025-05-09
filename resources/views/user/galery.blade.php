@extends('layouts.main')

@section('title', 'Galeri - Nataliving Furniture')

@section('content')
    <div class="bg-gray-50 min-h-screen">
        <!-- Page Header -->
        <div class="bg-white border-b">
            <div class="container mx-auto px-4 py-6">
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Galeri Nataliving</h1>
                <div class="flex flex-wrap items-center gap-2 mt-2 text-sm text-gray-500">
                    <a href="{{ route('home') }}" class="hover:text-nataliving-leaf">Beranda</a>
                    <span>/</span>
                    <span class="font-medium text-gray-700">Galeri</span>
                </div>
            </div>
        </div>

        @include('partials.galery')
        @include('partials.testimonial')
    </div>
    </div>

@endsection
