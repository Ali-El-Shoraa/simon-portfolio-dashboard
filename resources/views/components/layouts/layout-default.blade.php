<!DOCTYPE html>
<html lang="en">

<head>
    <x-partials.head>
        {{-- <meta property="og:type" content="website" /> --}}
    </x-partials.head>
</head>

<body class="">
    <x-partials.header-desctop />


    <x-partials.header-mobile />
    {{-- @livewire('partials.header-mobile') --}}

    <main class="">
        {{ $slot }}
    </main>

    <x-partials.footer />

    @livewireScripts
</body>

</html>
