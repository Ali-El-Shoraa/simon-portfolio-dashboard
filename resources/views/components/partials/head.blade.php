<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

<!-- Title -->
<title>{{ $title ?? 'Simon | Portfolio' }}</title>

<!-- SEO Meta Tags -->
<meta name="description"
    content="Portfolio of Simon - Frontend Developer specializing in React.js, Next.js, and modern web technologies. Explore projects, skills, and contact details." />
<meta name="keywords"
    content="Simon, Portfolio, Frontend Developer, React.js, Next.js, Web Development, JavaScript, Tailwind CSS" />
<meta name="author" content="Simon" />

<!-- Open Graph / Facebook -->
<meta property="og:title" content="{{ $title ?? 'Simon | Portfolio' }}" />
<meta property="og:description"
    content="Frontend Developer Portfolio showcasing React.js, Next.js, and modern web projects." />
<meta property="og:image" content="{{ asset('images/portfolio-preview.png') }}" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:type" content="website" />

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{{ $title ?? 'Simon | Portfolio' }}" />
<meta name="twitter:description"
    content="Explore Simon's frontend projects built with React.js, Next.js, and modern tools." />
<meta name="twitter:image" content="{{ asset('images/portfolio-preview.png') }}" />

<!-- Favicon -->
<link rel="icon" type="image/png" href="{{ asset('favicon.png') }}" />

{{ $slot ?? '' }}

{{-- @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css'])
@endif --}}
{{-- @endif --}}
@vite(['resources/css/app.css'])
@livewireStyles
