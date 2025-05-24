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
                                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                                            </div>
                                            <div
                                                class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-500">
                                            </div>
                                        </div>
                                    @endif
                                    <div class="p-6">
                                        <div class="uppercase tracking-wide text-sm text-nataliving-leaf font-semibold">
                                            {{ $blog->created_at->format('d M Y') }}
                                        </div>
                                        <h3
                                            class="mt-2 text-xl font-semibold text-gray-900 group-hover:text-nataliving-leaf">
                                            {{ $blog->title }}
                                        </h3>
                                        <p class="mt-3 text-gray-600 line-clamp-3">
                                            {!! strip_tags(substr($blog->content, 0, 150)) !!}...
                                        </p>
                                        <div class="mt-4">
                                            <span
                                                class="text-nataliving-leaf group-hover:text-nataliving-accent font-medium">
                                                Baca Selengkapnya →
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <p class="text-gray-500 text-sm col-span-full">Belum ada artikel yang tersedia.</p>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="mt-8">
                        {{ $blogs->links() }}
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
                                        <div class="relative overflow-hidden w-20 h-20 rounded">
                                            <img src="{{ asset('storage/' . $recentBlog->thumbnail) }}"
                                                alt="{{ $recentBlog->title }}"
                                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                                            <div
                                                class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-500">
                                            </div>
                                        </div>
                                    @endif
                                    <div>
                                        <h3 class="font-semibold text-gray-800 group-hover:text-nataliving-leaf">
                                            {{ $recentBlog->title }}
                                        </h3>
                                        <p class="text-sm text-gray-500 mt-1">
                                            {{ $recentBlog->created_at->format('d M Y') }}
                                        </p>
                                    </div>
                                </a>
                            @empty
                                <p class="text-gray-500 text-sm">Belum ada postingan terbaru.</p>
                            @endforelse
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
