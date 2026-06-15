<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Bank Sampah')</title>
        <meta
            name="description"
            content="@yield('meta_description', 'Website Bank Sampah untuk layanan setor sampah, tarik tunai, dan informasi lingkungan.')"
        >
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen">
        <div class="relative isolate overflow-x-hidden">
            @include('components.navbar')

            <main>
                @yield('content')
            </main>

            @include('components.footer')
        </div>
    </body>
</html>
