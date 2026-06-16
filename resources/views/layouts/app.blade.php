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
        
        <!-- Favicon placeholder -->
        <link rel="icon" href="{{ asset('favicon.ico') }}">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="flex min-h-full flex-col font-sans">
        <div class="relative isolate flex flex-1 flex-col overflow-x-hidden">
            @include('components.navbar')

            <main class="flex-1">
                @yield('content')
            </main>

            @include('components.footer')
        </div>
    </body>
</html>
