<h3 class="relative w-fit {{ $classDiv ?? '' }}">
    <a href="{{ $href ?? '#' }}"
        class="relative z-10 w-fit px-6 py-3 rounded-lg bg-white full-border text-gray-900 cursor-pointer transition font-dm-sans font-bold text-lg block {{ $classLink ?? '' }}">
        {{ $slot }}
        {{ $title ?? '' }}
    </a>
    <span class="absolute left-0 top-1/12 w-full h-full rounded-lg bg-purple-light full-border z-0"></span>
</h3>
