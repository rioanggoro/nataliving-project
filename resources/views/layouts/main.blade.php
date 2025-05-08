<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Nataliving Furniture')</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="font-sans bg-white">
    <!-- Bar Atas -->
    <div class="bg-nataliving-leaf text-white text-xs md:text-sm text-center py-2">
        Selamat Datang di Nataliving Furniture
    </div>

    <!-- Header -->
    <header class="flex flex-col md:flex-row items-center justify-between px-4 md:px-6 py-4 border-b">
        <!-- Logo dan Menu Sosial -->
        <a href="{{ route('home') }}">
            <img src="{{ asset('img/hero/logo_navbar.jpeg') }}" alt="Nataliving Furniture"
                class="hidden md:block md:h-14" />
        </a>

        <!-- Pencarian -->
        <div class="flex-grow w-full md:max-w-xl md:mx-6 mb-4 md:mb-0">
            <input type="text" placeholder="Cari Produk" class="w-full border px-4 py-2 rounded-md" />
        </div>
    </header>

    <!-- Navigasi Mobile Sidebar -->
    @include('partials.mobile-nav')

    @include('partials.desktop-nav')

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <script>
        const sidebar = document.getElementById("mobileSidebar");
        const overlay = document.getElementById("sidebarOverlay");

        document.getElementById("mobileMenuButton").addEventListener("click", () => {
            sidebar.classList.remove("translate-x-full");
            overlay.classList.remove("hidden");
        });

        document.getElementById("closeSidebar").addEventListener("click", () => {
            sidebar.classList.add("translate-x-full");
            overlay.classList.add("hidden");
        });

        overlay.addEventListener("click", () => {
            sidebar.classList.add("translate-x-full");
            overlay.classList.add("hidden");
        });
    </script>
</body>

</html>
