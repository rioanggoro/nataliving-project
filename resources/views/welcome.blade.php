<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Asli Kayu - Halaman Utama</title>
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
        <img src="{{ asset('img/hero/logo_navbar.jpeg') }}" alt="Asli Kayu" class="hidden md:block md:h-14" />


        <!-- Pencarian -->
        <div class="flex-grow w-full md:max-w-xl md:mx-6 mb-4 md:mb-0">
            <input type="text" placeholder="Cari Produk" class="w-full border px-4 py-2 rounded-md" />
        </div>
    </header>

    <!-- Navigasi Mobile Sidebar -->
    <div class="md:hidden border-b">
        <button id="mobileMenuButton" class="flex items-center justify-between w-full py-3 px-4 text-sm font-semibold">
            <span>Menu</span>
            <span class="material-icons">menu</span>
        </button>

        <!-- Sidebar menu -->
        <div id="mobileSidebar"
            class="fixed top-0 right-0 h-full w-64 bg-white shadow-lg transform translate-x-full transition-transform duration-300 z-50">
            <div class="flex items-center justify-between px-4 py-3 border-b">
                <span class="text-lg font-semibold">Menu</span>
                <button id="closeSidebar" class="text-gray-600">
                    <span class="material-icons">close</span>
                </button>
            </div>
            <div class="flex flex-col text-sm font-semibold divide-y">
                <a href="#" class="py-3 px-4 hover:bg-gray-100">Produk</a>
                <a href="#" class="py-3 px-4 hover:bg-gray-100">Profil</a>
                <a href="#" class="py-3 px-4 hover:bg-gray-100">Galeri</a>
                <a href="#" class="py-3 px-4 hover:bg-gray-100">Toko Kami</a>
                <a href="#" class="py-3 px-4 hover:bg-gray-100">Blog</a>
            </div>
        </div>

        <!-- Overlay -->
        <div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-40 hidden z-40"></div>
    </div>


    <!-- Navigasi Desktop -->
    <nav class="hidden md:flex justify-center gap-10 text-sm font-semibold py-4 border-b">
        <a href="#" class="hover:text-green-700">Produk</a>
        <a href="#" class="hover:text-green-700">Profil</a>
        <a href="#" class="hover:text-green-700">Galeri</a>
        <a href="#" class="hover:text-green-700">Toko Kami</a>
        <a href="#" class="hover:text-green-700">Blog</a>
    </nav>

    @include('partials.hero')
    @include('partials.categories')


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
