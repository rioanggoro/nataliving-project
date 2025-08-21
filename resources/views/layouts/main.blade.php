<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Nataliving Furniture')</title>

    <!-- Meta Tags untuk SEO dan Social Media -->
    <meta name="description" content="@yield('description', 'Nataliving Furniture - Furniture berkualitas tinggi dengan desain modern dan elegan')">
    <meta name="keywords" content="@yield('keywords', 'furniture, mebel, kursi, meja, lemari, sofa, nataliving')">

    <!-- Open Graph Meta Tags untuk WhatsApp/Facebook -->
    <meta property="og:title" content="@yield('og_title', 'Nataliving Furniture')">
    <meta property="og:description" content="@yield('og_description', 'Furniture berkualitas tinggi dengan desain modern dan elegan')">
    <meta property="og:image" content="@yield('og_image', asset('img/hero/logo_navbar.jpeg'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:site_name" content="Nataliving Furniture">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('og_title', 'Nataliving Furniture')">
    <meta name="twitter:description" content="@yield('og_description', 'Furniture berkualitas tinggi dengan desain modern dan elegan')">
    <meta name="twitter:image" content="@yield('og_image', asset('img/hero/logo_navbar.jpeg'))">

    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('img/hero/logo_navbar.jpeg') }}" type="image/jpeg">
    <!-- Material Icons CDN -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body class="font-sans bg-white">
    <!-- Bar Atas -->
    <div class="bg-nataliving-leaf text-white text-xs md:text-sm text-center py-2">
        Selamat Datang di Nataliving Furniture
    </div>


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
