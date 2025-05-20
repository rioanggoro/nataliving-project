<div class="md:hidden border-b">
    <!-- Tombol menu -->
    <button id="mobileMenuButton" class="flex items-center justify-between w-full py-3 px-4 text-sm font-semibold">
        <span>Menu</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>



    <!-- Sidebar menu -->
    <div id="mobileSidebar"
        class="fixed top-0 right-0 h-full w-64 bg-white shadow-lg transform translate-x-full transition-transform duration-300 z-50">
        <div class="flex items-center justify-between px-4 py-3 border-b">
            <span class="text-lg font-semibold">Menu</span>
            <button id="closeSidebar" class="text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-x-icon lucide-x">
                    <path d="M18 6 6 18" />
                    <path d="m6 6 12 12" />
                </svg>
            </button>
        </div>
        <div class="flex flex-col text-sm font-semibold divide-y">
            <a href="{{ route('shop.index') }}" class="py-3 px-4 hover:bg-gray-100">Produk</a>
            <a href="{{ route('about') }}" class="py-3 px-4 hover:bg-gray-100">Profil</a>
            <a href="{{ route('galery') }}" class="py-3 px-4 hover:bg-gray-100">Galeri</a>
            <a href="{{ route('my-store') }}" class="py-3 px-4 hover:bg-gray-100">Toko Kami</a>
            <a href="{{ route('blog.index') }}" class="py-3 px-4 hover:bg-gray-100">Blog</a>
        </div>
    </div>

    <!-- Overlay -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-40 hidden z-40"></div>
</div>

@push('scripts')
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
@endpush
