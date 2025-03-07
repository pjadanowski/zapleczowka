<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    />
    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    />
    <meta
        name="description"
        content="@yield('meta_description')"
    />
    <meta
        name="keywords"
        content="@yield('meta_keywords')"
    />

    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link
        rel="preconnect"
        href="https://fonts.bunny.net"
    />
    <link
        href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap"
        rel="stylesheet"
    />

    @include('components.templates.bloggar.styles')

    @yield('css')
    @stack('css')
</head>
<body class="font-sans">
    <main>
        @include('components.templates.bloggar.top-navbar')
        @yield('content')
        {{ $slot ?? '' }}
    </main>

    @include('components.templates.bloggar.footer')

    @include('components.templates.bloggar.scripts')

    @yield('js')
    @stack('js')
</body>
</html>
