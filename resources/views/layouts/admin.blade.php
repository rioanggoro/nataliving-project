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
        <aside class="w-64 bg-white shadow-md p-6">
            <h1 class="text-xl font-bold mb-6">Soft UI Admin</h1>
            <nav class="space-y-4">
                <a href="{{ route('admin.dashboard') }}" class="block text-blue-600 font-semibold">Dashboard</a>
                <a href="{{ route('products.index') }}" class="block text-gray-700 hover:text-blue-500">Produk</a>
                <a href="{{ route('categories.index') }}" class="block text-gray-700 hover:text-blue-500">Kategori</a>
            </nav>
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
