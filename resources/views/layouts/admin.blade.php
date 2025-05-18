<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-50 text-gray-900 font-[Inter]">
    <div class="flex h-screen">

        {{-- Sidebar --}}
        <aside class="w-64 bg-white border-r border-gray-200 shadow-sm flex flex-col h-full">
            {{-- Logo dan Judul --}}
            <div class="px-6 py-5 border-b border-gray-200">
                <div class="flex items-center gap-3">
                    <div class="bg-indigo-600 p-2 rounded-lg">
                        <i data-lucide="layout-dashboard" class="w-6 h-6 text-white"></i>
                    </div>
                    <div>
                        <h1 class="text-lg font-semibold text-gray-800">NataLiving</h1>
                        <p class="text-xs text-gray-500">Admin Dashboard</p>
                    </div>
                </div>
            </div>

            {{-- Menu Navigasi --}}
            <div class="flex-1 overflow-y-auto py-5 px-4">
                <p class="text-xs font-medium text-gray-400 uppercase tracking-wider mb-4 px-2">Menu</p>
                <nav class="space-y-1">
                    {{-- Dashboard --}}
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center gap-3 px-3 py-3 rounded-lg transition-all duration-200 group
                        {{ request()->routeIs('admin.dashboard')
                            ? 'bg-indigo-50 text-indigo-600'
                            : 'text-gray-600 hover:bg-indigo-50 hover:text-indigo-600' }}">
                        <div
                            class="{{ request()->routeIs('admin.dashboard') ? 'bg-indigo-600' : 'bg-gray-200 group-hover:bg-indigo-600' }} p-2 rounded-lg transition-all duration-200">
                            <i data-lucide="home"
                                class="w-4 h-4 {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-gray-600 group-hover:text-white' }}"></i>
                        </div>
                        <span class="font-medium">Dashboard</span>
                        @if (request()->routeIs('admin.dashboard'))
                            <div class="ml-auto w-1.5 h-6 rounded-full bg-indigo-600"></div>
                        @endif
                    </a>

                    {{-- Produk --}}
                    <a href="{{ route('products.index') }}"
                        class="flex items-center gap-3 px-3 py-3 rounded-lg transition-all duration-200 group
                        {{ request()->routeIs('products.*')
                            ? 'bg-indigo-50 text-indigo-600'
                            : 'text-gray-600 hover:bg-indigo-50 hover:text-indigo-600' }}">
                        <div
                            class="{{ request()->routeIs('products.*') ? 'bg-indigo-600' : 'bg-gray-200 group-hover:bg-indigo-600' }} p-2 rounded-lg transition-all duration-200">
                            <i data-lucide="package"
                                class="w-4 h-4 {{ request()->routeIs('products.*') ? 'text-white' : 'text-gray-600 group-hover:text-white' }}"></i>
                        </div>
                        <span class="font-medium">Produk</span>
                        @if (request()->routeIs('products.*'))
                            <div class="ml-auto w-1.5 h-6 rounded-full bg-indigo-600"></div>
                        @endif
                    </a>

                    {{-- Kategori --}}
                    <a href="{{ route('categories.index') }}"
                        class="flex items-center gap-3 px-3 py-3 rounded-lg transition-all duration-200 group
                        {{ request()->routeIs('categories.*')
                            ? 'bg-indigo-50 text-indigo-600'
                            : 'text-gray-600 hover:bg-indigo-50 hover:text-indigo-600' }}">
                        <div
                            class="{{ request()->routeIs('categories.*') ? 'bg-indigo-600' : 'bg-gray-200 group-hover:bg-indigo-600' }} p-2 rounded-lg transition-all duration-200">
                            <i data-lucide="grid"
                                class="w-4 h-4 {{ request()->routeIs('categories.*') ? 'text-white' : 'text-gray-600 group-hover:text-white' }}"></i>
                        </div>
                        <span class="font-medium">Kategori</span>
                        @if (request()->routeIs('categories.*'))
                            <div class="ml-auto w-1.5 h-6 rounded-full bg-indigo-600"></div>
                        @endif
                    </a>

                    {{-- Blog --}}
                    <a href="{{ route('blogs.index') }}"
                        class="flex items-center gap-3 px-3 py-3 rounded-lg transition-all duration-200 group
    {{ request()->routeIs('blogs.*') ? 'bg-indigo-50 text-indigo-600' : 'text-gray-600 hover:bg-indigo-50 hover:text-indigo-600' }}">
                        <div
                            class="{{ request()->routeIs('blogs.*') ? 'bg-indigo-600' : 'bg-gray-200 group-hover:bg-indigo-600' }} p-2 rounded-lg transition-all duration-200">
                            <i data-lucide="file-text"
                                class="w-4 h-4 {{ request()->routeIs('blogs.*') ? 'text-white' : 'text-gray-600 group-hover:text-white' }}"></i>
                        </div>
                        <span class="font-medium">Blog</span>
                    </a>
                </nav>
            </div>

            {{-- User Profile & Logout --}}
            <div class="border-t border-gray-200 p-4">
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center space-x-3">
                        <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center">
                            <i data-lucide="user" class="w-5 h-5 text-indigo-600"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-700">Admin</p>
                            <p class="text-xs text-gray-500">admin@gmail.com</p>
                        </div>
                    </div>
                </div>

                <form method="POST" action="{{ route('admin.auth.logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center justify-center gap-2 px-3 py-2 mt-2 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 transition-colors duration-200">
                        <i data-lucide="log-out" class="w-4 h-4"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        {{-- Main content --}}
        <main class="flex-1 overflow-y-auto">
            <header class="flex justify-between items-center px-8 py-5 bg-white border-b border-gray-200">
                <h2 class="text-xl font-bold text-gray-800">@yield('title')</h2>
            </header>

            <div class="p-8">
                @yield('content')
            </div>
        </main>
    </div>
    <script>
        lucide.createIcons();
    </script>
    @stack('scripts')
</body>

</html>
