<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nataliving Furniture</title>
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('img/hero/logo_navbar.jpeg') }}" type="image/jpeg">
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
    </header>

    @include('partials.mobile-nav')
    @include('partials.desktop-nav')
    @include('partials.hero')
    @include('partials.categories')
    @include('partials.product')
    @include('partials.whyChooseUs')
    @include('partials.faq')
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
    @stack('scripts')

</body>

</html>
