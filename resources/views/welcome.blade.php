<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Asli Kayu - Halaman Utama</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans bg-white">
    <!-- Bar Atas -->
    <div class="bg-orange-800 text-white text-sm text-center py-2">
        Selamat Datang di Nataliving Furniture
    </div>

    <!-- Header -->
    <header class="flex items-center justify-between px-6 py-4 border-b">
        <!-- Logo dan Menu Sosial -->
        <div class="flex items-center gap-4">
            <img src="/logo-asli-kayu.png" alt="Asli Kayu" class="h-10" />
        </div>

        <!-- Pencarian -->
        <div class="flex-grow max-w-xl mx-6">
            <input type="text" placeholder="Cari Produk" class="w-full border px-4 py-2 rounded-md" />
        </div>

        <!-- Ikon User -->
        <div class="flex items-center gap-4 text-gray-600">
            <span class="material-icons">person</span>
            <span class="relative">
                <span class="material-icons">star</span>
                <span
                    class="absolute -top-2 -right-2 bg-green-600 text-xs text-white rounded-full w-4 h-4 flex items-center justify-center">0</span>
            </span>
            <span class="relative">
                <span class="material-icons">shopping_cart</span>
                <span
                    class="absolute -top-2 -right-2 bg-green-600 text-xs text-white rounded-full w-4 h-4 flex items-center justify-center">0</span>
            </span>
        </div>
    </header>

    <!-- Navigasi -->
    <nav class="flex justify-center gap-10 text-sm font-semibold py-4 border-b">
        <a href="#">Produk</a>
        <a href="#">Profil</a>
        <a href="#">Galeri</a>
        <a href="#">Toko Kami</a>
        <a href="#">Blog</a>
    </nav>

    <!-- Hero Section -->
    <section class="relative h-[80vh] bg-cover bg-center text-white" style="background-image: url('/img-hero.jpg');">
        <div class="absolute inset-0 bg-black/50 flex items-center px-10 md:px-20">
            <div class="max-w-lg">
                <h1 class="text-4xl md:text-5xl font-bold mb-4 leading-tight">
                    Kenyamanan<br />
                    dan Keanggunan<br />
                    Furniture Anda
                </h1>
                <p class="mb-6 text-sm md:text-base">
                    Temukan berbagai furniture yang menggabungkan desain modern dengan kenyamanan tiada tara.
                </p>
                <a href="#" class="bg-green-700 hover:bg-green-800 text-white font-semibold px-6 py-2 rounded">
                    Dapatkan Sekarang
                </a>
            </div>
        </div>
    </section>
</body>

</html>
