<header class="w-full sticky top-0 z-50 lg:hidden block">
    <div class="bottom-border bg-white container-1140 h-20 flex items-center justify-between py-3 relative z-50">
        <!-- Logo -->
        <x-partials.logo />
        <!-- button nav burger -->
        <button id="menu-toggle" class="p-2 rounded-md border border-gray-300" aria-label="Toggle menu">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <!-- Overlay -->
    <div id="menu-overlay" class="fixed inset-0 bg-black/50 z-40 hidden transition-opacity duration-300">
    </div>

    <!-- Menu -->
    <div id="mobile-menu"
        class="container-1140 p-0 mx-8 fixed left-0 right-0 top-20 z-50 flex flex-col gap-6 transform -translate-y-6 opacity-0 pointer-events-none transition-all duration-300">
        <div class="bg-white p-6 rounded-b-lg bottom-border border-x-2 flex flex-col gap-6">
            <!-- Navbar -->
            <nav class="flex justify-center flex-col gap-3 px-4 text-lg font-semibold text-black-light">
                <a onclick="closeMenu()" href="/#home" class="hover:text-purple">Home</a>
                <a onclick="closeMenu()" href="/#services" class="hover:text-purple">Services</a>
                <a onclick="closeMenu()" href="/#about" class="hover:text-purple">About</a>
                <a onclick="closeMenu()" href="/#portfolio" class="hover:text-purple">Portfolio</a>
                <a onclick="closeMenu()" href="/#process" class="hover:text-purple">Process</a>
                <a onclick="closeMenu()" href="/#pricing" class="hover:text-purple">Pricing</a>
                <a onclick="closeMenu()" href="/#contact" class="hover:text-purple">Contact</a>
            </nav>
            <!-- Social Media -->
            <x-partials.social-media />
        </div>
    </div>
</header>

<!-- script to animation and dropdown -->
<script>
    const menuToggleBtn = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuOverlay = document.getElementById('menu-overlay');

    function openMenu() {
        mobileMenu.classList.remove('opacity-0', '-translate-y-6', 'pointer-events-none');
        mobileMenu.classList.add('opacity-100', 'translate-y-0');
        menuOverlay.classList.remove('hidden');
    }

    function closeMenu() {
        mobileMenu.classList.add('opacity-0', '-translate-y-6', 'pointer-events-none');
        mobileMenu.classList.remove('opacity-100', 'translate-y-0');
        menuOverlay.classList.add('hidden');
    }

    menuToggleBtn.addEventListener('click', () => {
        if (mobileMenu.classList.contains('pointer-events-none')) {
            openMenu();
        } else {
            closeMenu();
        }
    });

    menuOverlay.addEventListener('click', () => {
        closeMenu();
    });
</script>
