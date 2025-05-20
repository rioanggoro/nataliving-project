@extends('layouts.main')

@section('title'){{ $blog->title }} - Nataliving Furniture @endsection

@section('content')
    <section class="bg-white">
        <!-- Page Header -->
        <div class="bg-white border-b">
            <div class="container mx-auto px-4 py-6">
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Blog</h1>
                <nav class="flex flex-wrap items-center gap-2 mt-2 text-sm text-gray-500">
                    <a href="{{ route('home') }}" class="hover:text-nataliving-leaf">Home</a>
                    <span>/</span>
                    <a href="{{ route('blog.index') }}" class="hover:text-nataliving-leaf">Blog</a>
                    <span>/</span>
                    <span class="font-medium text-gray-700">{{ $blog->title }}</span>
                </nav>
            </div>
        </div>

        <!-- Blog Content -->
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Blog Content -->
                <div class="lg:col-span-2">
                    <article class="bg-white rounded-lg shadow-md overflow-hidden">
                        @if($blog->thumbnail)
                            <img src="{{ asset('storage/' . $blog->thumbnail) }}" 
                                 alt="{{ $blog->title }}"
                                 class="w-full h-[400px] object-cover">
                        @endif
                        
                        <div class="p-8">
                            <div class="mb-6">
                                <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $blog->title }}</h1>
                                <div class="flex items-center text-gray-500 text-sm">
                                    <span>{{ $blog->created_at->format('d M Y') }}</span>
                                </div>
                            </div>

                            <div class="prose prose-lg max-w-none">
                                {!! $blog->content !!}
                            </div>
                        </div>
                    </article>
                </div>

                <!-- Sidebar - Recent Posts -->
                <div class="lg:col-span-1">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">Recent Posts</h2>
                        <div class="space-y-4">
                            @foreach($recentBlogs as $recentBlog)
                                <div class="flex gap-4">
                                    @if($recentBlog->thumbnail)
                                        <img src="{{ asset('storage/' . $recentBlog->thumbnail) }}" 
                                             alt="{{ $recentBlog->title }}"
                                             class="w-20 h-20 object-cover rounded">
                                    @endif
                                    <div>
                                        <h3 class="font-semibold text-gray-800 hover:text-nataliving-leaf">
                                            <a href="{{ route('blog.show', $recentBlog->slug) }}">
                                                {{ $recentBlog->title }}
                                            </a>
                                        </h3>
                                        <p class="text-sm text-gray-500 mt-1">
                                            {{ $recentBlog->created_at->format('d M Y') }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
