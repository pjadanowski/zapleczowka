<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title> @yield('title') {{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @php
            $templateName = 'newspaper';
        @endphp

        @includeIf("components.templates.$templateName.styles")

        @yield('css')
        @stack('css')
    </head>
    <body class="font-sans">
        <main>       
            @includeIf("components.templates.$templateName.label-top")
            @includeIf("components.templates.$templateName.top-navbar")
            @yield('content')
            {{ $slot ?? ''}}
        </main>
        
        @includeIf("components.templates.$templateName.footer")
        
        @includeIf("components.templates.$templateName.scripts")
        
        @yield('js')
        @stack('js')
    </body>
</html>
