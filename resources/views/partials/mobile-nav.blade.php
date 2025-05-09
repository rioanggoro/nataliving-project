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
            <a href="{{ route('shop.index') }}" class="py-3 px-4 hover:bg-gray-100">Produk</a>
            <a href="{{ route('about') }}" class="py-3 px-4 hover:bg-gray-100">Profil</a>
            <a href="#" class="py-3 px-4 hover:bg-gray-100">Galeri</a>
            <a href="{{ route('my-store') }}" class="py-3 px-4 hover:bg-gray-100">Toko Kami</a>
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
