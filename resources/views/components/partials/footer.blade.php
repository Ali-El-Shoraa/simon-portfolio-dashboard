<footer class="px-8 pt-16 pb-28 bg-purple-light text-gray-500">
    <div class="max-w-[900px] mx-auto space-y-6 max-lg:space-y-2">
        <div class="flex items-center justify-between max-lg:flex-col gap-2">
            {{-- logo --}}
            <x-partials.logo />

            {{-- nav --}}
            <nav class="flex items-center justify-center gap-8 text-lg font-semibold text-black-light font-cabinet">
                <a href="/#about" class="hover:text-purple -tracking-tighter">About</a>
                <a href="/#contact" class="hover:text-purple -tracking-tighter">Contact</a>
                <a href="/#portfolio" class="hover:text-purple -tracking-tighter">Portfolio</a>
            </nav>
        </div>

        <div class="flex items-center justify-between max-lg:flex-col gap-4">
            <div class="">
                &copy; {{ date('Y') }} {{ $appName ?? 'Portfolio' }}. All rights reserved.
            </div>

            <!-- Social Media -->
            <x-partials.social-media />
        </div>
    </div>
</footer>
