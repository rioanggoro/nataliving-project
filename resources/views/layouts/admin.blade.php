<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>


</head>

<body class="bg-gray-50 text-gray-900">
    <div class="flex h-screen">

        {{-- Sidebar --}}
        <aside class="w-64 bg-gray-200 shadow-md shadow-black flex flex-col justify-between p-6">
            <div>
                <h1 class="flex items-center gap-2 text-xl font-normal mb-6 bg-blue-500 px-4 py-2 rounded-md">
                    <i data-lucide="user" class="w-5 h-5 text-white"></i>
                    <span class="text-white">Admin Page</span>
                </h1>

                <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-500">
                <nav class="space-y-4">

                    {{-- Dashboard --}}
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center gap-2 px-3 py-2 rounded-md transition 
              {{ request()->routeIs('admin.dashboard')
                  ? 'bg-blue-500 text-white font-semibold'
                  : 'text-gray-700 hover:text-blue-500' }}">
                        <i data-lucide="home" class="w-5 h-5"></i>
                        <span>Dashboard</span>
                    </a>

                    {{-- Produk --}}
                    <a href="{{ route('products.index') }}"
                        class="flex items-center gap-2 px-3 py-2 rounded-md transition 
              {{ request()->routeIs('products.*')
                  ? 'bg-blue-500 text-white font-semibold'
                  : 'text-gray-700 hover:text-blue-500' }}">
                        <i data-lucide="package" class="w-5 h-5"></i>
                        <span>Produk</span>
                    </a>

                    {{-- Kategori --}}
                    <a href="{{ route('categories.index') }}"
                        class="flex items-center gap-2 px-3 py-2 rounded-md transition 
              {{ request()->routeIs('categories.*')
                  ? 'bg-blue-500 text-white font-semibold'
                  : 'text-gray-700 hover:text-blue-500' }}">
                        <i data-lucide="grid" class="w-5 h-5"></i>
                        <span>Kategori</span>
                    </a>

                </nav>
            </div>

            {{-- Logout di bawah --}}
            <form method="POST" action="">
                @csrf
                <button type="submit" class="mt-8 flex items-center space-x-1 text-red-600 hover:text-red-800">
                    <i data-lucide="log-out" class="w-5 h-5"></i>
                    <span>Logout</span>
                </button>
            </form>
        </aside>


        {{-- Main content --}}
        <main class="flex-1 overflow-y-auto p-8">
            <header class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">@yield('title')</h2>
                <input type="text" placeholder="Search..." class="border rounded px-4 py-1">
            </header>

            @yield('content')
        </main>
    </div>
    <script>
        lucide.createIcons();
    </script>
    @stack('scripts')
</body>

</html>
