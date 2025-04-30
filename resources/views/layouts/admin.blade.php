<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-900">
    <div class="flex h-screen">

        {{-- Sidebar --}}
        <aside class="w-64 bg-white shadow-md flex flex-col justify-between p-6">
            <div>
                <h1 class="text-xl font-bold mb-6">Admin Page</h1>
                <nav class="space-y-4">
                    <a href="{{ route('admin.dashboard') }}" class="block text-blue-600 font-semibold">Dashboard</a>
                    <a href="{{ route('products.index') }}" class="block text-gray-700 hover:text-blue-500">Produk</a>
                    <a href="{{ route('categories.index') }}"
                        class="block text-gray-700 hover:text-blue-500">Kategori</a>
                </nav>
            </div>

            {{-- Logout di bawah --}}
            <form method="POST" action="">
                @csrf
                <button type="submit" class="mt-8 flex items-center space-x-1 text-red-600 hover:text-red-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1m0-10V5" />
                    </svg>
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
</body>

</html>
