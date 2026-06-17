<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Bank Sampah')</title>
        <meta
            name="description"
            content="@yield('meta_description', 'Website Bank Sampah untuk layanan setor sampah, tarik tunai, dan informasi lingkungan.')"
        >

        <!-- Favicon -->
        <link rel="icon" href="{{ asset('favicon.ico') }}">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Alpine.js for Interactivity -->
        <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    <body class="flex min-h-full flex-col font-sans">
        <div class="relative isolate flex flex-1 flex-col overflow-x-hidden">
            <x-layout.navbar />

            <main class="flex-1">
                @yield('content')
            </main>

            <x-layout.footer />
        </div>
    </body>
</html>
