@extends('layouts.main')

@section('title', 'Blog - Nataliving Furniture')

@section('content')
    <section class="bg-white">
        <!-- Page Header -->
        <div class="bg-white border-b">
            <div class="container mx-auto px-4 py-6">
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Blog</h1>
                <nav class="flex flex-wrap items-center gap-2 mt-2 text-sm text-gray-500">
                    <a href="{{ route('home') }}" class="hover:text-nataliving-leaf">Home</a>
                    <span>/</span>
                    <span class="font-medium text-gray-700">Blog</span>
                </nav>
            </div>
        </div>

        <!-- Blog Content -->
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Blog Posts -->
                <div class="lg:col-span-2">
                    <!-- Blog Posts Info -->
                    <div class="mb-6 text-sm text-gray-600">
                        <span class="hidden md:inline">
                            Menampilkan {{ $blogs->count() }} dari {{ $blogs->total() }} artikel
                        </span>
                        <span class="md:hidden">
                            {{ $blogs->count() }} dari {{ $blogs->total() }} artikel
                        </span>
                    </div>

                    <!-- Blog Posts Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @forelse ($blogs as $blog)
                            <a href="{{ route('blog.show', $blog->slug) }}" class="group">
                                <div
                                    class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:-translate-y-1">
                                    @if ($blog->thumbnail)
                                        <div class="relative overflow-hidden">
                                            <div class="aspect-w-16 aspect-h-10">
                                                <img src="{{ asset('storage/' . $blog->thumbnail) }}"
                                                    alt="{{ $blog->title }}"
                                                    class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-110">
                                            </div>
                                            <div
                                                class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-500">
                                            </div>
                                        </div>
                                    @else
                                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                            <span class="material-icons text-4xl text-gray-400">article</span>
                                        </div>
                                    @endif
                                    <div class="p-6">
                                        <div class="flex items-center gap-2 mb-2">
                                            <span
                                                class="uppercase tracking-wide text-xs text-nataliving-leaf font-semibold">
                                                {{ $blog->created_at->format('d M Y') }}
                                            </span>
                                            @if ($blog->category ?? false)
                                                <span class="text-xs text-gray-400">•</span>
                                                <span class="text-xs text-gray-500 uppercase tracking-wide">
                                                    {{ $blog->category }}
                                                </span>
                                            @endif
                                        </div>
                                        <h3
                                            class="text-lg md:text-xl font-semibold text-gray-900 group-hover:text-nataliving-leaf transition-colors line-clamp-2">
                                            {{ $blog->title }}
                                        </h3>
                                        <p class="mt-3 text-gray-600 text-sm line-clamp-3">
                                            @if ($blog->excerpt ?? false)
                                                {{ $blog->excerpt }}
                                            @else
                                                {!! strip_tags(substr($blog->content, 0, 120)) !!}...
                                            @endif
                                        </p>
                                        <div class="mt-4 flex items-center justify-between">
                                            <span
                                                class="text-nataliving-leaf group-hover:text-nataliving-accent font-medium text-sm transition-colors">
                                                Baca Selengkapnya →
                                            </span>
                                            <div class="flex items-center text-xs text-gray-400">
                                                <span class="material-icons text-sm mr-1">schedule</span>
                                                <span>{{ $blog->read_time ?? '5' }} min read</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <div class="col-span-full text-center py-12">
                                <div class="flex flex-col items-center">
                                    <span class="material-icons text-5xl text-gray-300 mb-4">article</span>
                                    <h3 class="text-lg font-medium text-gray-900 mb-1">Belum ada artikel</h3>
                                    <p class="text-gray-500 mb-4">Artikel blog akan segera hadir</p>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="mt-10 flex justify-center">
                        @if ($blogs->hasPages())
                            <nav aria-label="Blog pagination">
                                <ul class="inline-flex -space-x-px text-sm md:text-base">
                                    {{-- Previous Page Link --}}
                                    <li>
                                        @if ($blogs->onFirstPage())
                                            <span
                                                class="flex items-center justify-center px-3 md:px-4 h-8 md:h-10 ms-0 leading-tight text-gray-400 bg-white border border-e-0 border-gray-300 rounded-s-lg cursor-not-allowed">
                                                <span class="hidden sm:inline">Previous</span>
                                                <span class="sm:hidden">Prev</span>
                                            </span>
                                        @else
                                            <a href="{{ $blogs->previousPageUrl() }}"
                                                class="flex items-center justify-center px-3 md:px-4 h-8 md:h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 transition-colors">
                                                <span class="hidden sm:inline">Previous</span>
                                                <span class="sm:hidden">Prev</span>
                                            </a>
                                        @endif
                                    </li>

                                    {{-- Pagination Elements --}}
                                    @php
                                        $start = max($blogs->currentPage() - 2, 1);
                                        $end = min($start + 4, $blogs->lastPage());
                                        $start = max($end - 4, 1);
                                    @endphp

                                    {{-- First Page --}}
                                    @if ($start > 1)
                                        <li>
                                            <a href="{{ $blogs->url(1) }}"
                                                class="flex items-center justify-center px-3 md:px-4 h-8 md:h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 transition-colors">
                                                1
                                            </a>
                                        </li>
                                        @if ($start > 2)
                                            <li>
                                                <span
                                                    class="flex items-center justify-center px-3 md:px-4 h-8 md:h-10 leading-tight text-gray-500 bg-white border border-gray-300">
                                                    ...
                                                </span>
                                            </li>
                                        @endif
                                    @endif

                                    {{-- Page Numbers --}}
                                    @for ($page = $start; $page <= $end; $page++)
                                        <li>
                                            @if ($page == $blogs->currentPage())
                                                <span aria-current="page"
                                                    class="flex items-center justify-center px-3 md:px-4 h-8 md:h-10 text-white border border-gray-300 bg-nataliving-leaf hover:bg-green-800 font-medium">
                                                    {{ $page }}
                                                </span>
                                            @else
                                                <a href="{{ $blogs->url($page) }}"
                                                    class="flex items-center justify-center px-3 md:px-4 h-8 md:h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 transition-colors">
                                                    {{ $page }}
                                                </a>
                                            @endif
                                        </li>
                                    @endfor

                                    {{-- Last Page --}}
                                    @if ($end < $blogs->lastPage())
                                        @if ($end < $blogs->lastPage() - 1)
                                            <li>
                                                <span
                                                    class="flex items-center justify-center px-3 md:px-4 h-8 md:h-10 leading-tight text-gray-500 bg-white border border-gray-300">
                                                    ...
                                                </span>
                                            </li>
                                        @endif
                                        <li>
                                            <a href="{{ $blogs->url($blogs->lastPage()) }}"
                                                class="flex items-center justify-center px-3 md:px-4 h-8 md:h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 transition-colors">
                                                {{ $blogs->lastPage() }}
                                            </a>
                                        </li>
                                    @endif

                                    {{-- Next Page Link --}}
                                    <li>
                                        @if ($blogs->hasMorePages())
                                            <a href="{{ $blogs->nextPageUrl() }}"
                                                class="flex items-center justify-center px-3 md:px-4 h-8 md:h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 transition-colors">
                                                <span class="hidden sm:inline">Next</span>
                                                <span class="sm:hidden">Next</span>
                                            </a>
                                        @else
                                            <span
                                                class="flex items-center justify-center px-3 md:px-4 h-8 md:h-10 leading-tight text-gray-400 bg-white border border-gray-300 rounded-e-lg cursor-not-allowed">
                                                <span class="hidden sm:inline">Next</span>
                                                <span class="sm:hidden">Next</span>
                                            </span>
                                        @endif
                                    </li>
                                </ul>
                            </nav>

                            <!-- Pagination Info -->
                            <div class="mt-4 text-center">
                                <p class="text-sm text-gray-600">
                                    <span class="hidden md:inline">
                                        Menampilkan {{ $blogs->firstItem() }} - {{ $blogs->lastItem() }} dari
                                        {{ $blogs->total() }} artikel
                                    </span>
                                    <span class="md:hidden">
                                        {{ $blogs->firstItem() }}-{{ $blogs->lastItem() }} dari {{ $blogs->total() }}
                                    </span>
                                </p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Sidebar - Recent Posts -->
                <div class="lg:col-span-1">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">Recent Posts</h2>
                        <div class="space-y-4">
                            @forelse($recentBlogs as $recentBlog)
                                <a href="{{ route('blog.show', $recentBlog->slug) }}" class="flex gap-4 group">
                                    @if ($recentBlog->thumbnail)
                                        <div class="relative overflow-hidden w-20 h-20 rounded flex-shrink-0">
                                            <img src="{{ asset('storage/' . $recentBlog->thumbnail) }}"
                                                alt="{{ $recentBlog->title }}"
                                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                                            <div
                                                class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-500">
                                            </div>
                                        </div>
                                    @else
                                        <div
                                            class="w-20 h-20 bg-gray-200 rounded flex items-center justify-center flex-shrink-0">
                                            <span class="material-icons text-gray-400">article</span>
                                        </div>
                                    @endif
                                    <div class="flex-1 min-w-0">
                                        <h3
                                            class="font-semibold text-gray-800 group-hover:text-nataliving-leaf transition-colors text-sm line-clamp-2">
                                            {{ $recentBlog->title }}
                                        </h3>
                                        <p class="text-xs text-gray-500 mt-1">
                                            {{ $recentBlog->created_at->format('d M Y') }}
                                        </p>
                                        @if ($recentBlog->category ?? false)
                                            <span class="inline-block mt-1 text-xs text-nataliving-leaf font-medium">
                                                {{ $recentBlog->category }}
                                            </span>
                                        @endif
                                    </div>
                                </a>
                            @empty
                                <div class="text-center py-4">
                                    <span class="material-icons text-2xl text-gray-300 mb-2">article</span>
                                    <p class="text-gray-500 text-sm">Belum ada postingan terbaru.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <!-- Categories Widget (Optional) -->
                    @if (isset($categories) && $categories->count() > 0)
                        <div class="bg-white p-6 rounded-lg shadow-md mt-6">
                            <h2 class="text-xl font-bold text-gray-800 mb-4">Categories</h2>
                            <div class="space-y-2">
                                @foreach ($categories as $category)
                                    <a href="{{ route('blog.category', $category->slug) }}"
                                        class="flex items-center justify-between py-2 px-3 rounded hover:bg-gray-50 transition-colors group">
                                        <span
                                            class="text-gray-700 group-hover:text-nataliving-leaf">{{ $category->name }}</span>
                                        <span class="text-xs text-gray-400 bg-gray-100 px-2 py-1 rounded-full">
                                            {{ $category->posts_count ?? 0 }}
                                        </span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Tags Widget (Optional) -->
                    @if (isset($tags) && $tags->count() > 0)
                        <div class="bg-white p-6 rounded-lg shadow-md mt-6">
                            <h2 class="text-xl font-bold text-gray-800 mb-4">Tags</h2>
                            <div class="flex flex-wrap gap-2">
                                @foreach ($tags as $tag)
                                    <a href="{{ route('blog.tag', $tag->slug) }}"
                                        class="inline-block px-3 py-1 text-xs bg-gray-100 text-gray-700 rounded-full hover:bg-nataliving-leaf hover:text-white transition-colors">
                                        {{ $tag->name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
@endsection
