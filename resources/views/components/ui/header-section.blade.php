<div
    class="flex items-center gap-1.5 full-border rounded-full px-3.5 py-1.5 w-fit bg-purple-light-secoundary -tracking-tighter {{ $class ?? '' }}">
    <svg viewBox="-60 -60 120 120" width="10" height="10" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
        class="text-black">
        <defs>
            <ellipse id="petal" cx="0" cy="-32" rx="12" ry="26" />
        </defs>

        <use href="#petal" transform="rotate(0)" />
        <use href="#petal" transform="rotate(45)" />
        <use href="#petal" transform="rotate(90)" />
        <use href="#petal" transform="rotate(135)" />
        <use href="#petal" transform="rotate(180)" />
        <use href="#petal" transform="rotate(225)" />
        <use href="#petal" transform="rotate(270)" />
        <use href="#petal" transform="rotate(315)" />

        <circle r="7" />
    </svg>

    <h3 class="text-xs font-extrabold font-dm-sans uppercase">
        {{ $title ?? '' }}
    </h3>
</div>
