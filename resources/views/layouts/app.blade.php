<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen flex flex-col bg-aeon-light/40">
            <div class="h-1 bg-aeon"></div>

            @include('layouts.navigation')

            @isset($header)
                <header class="bg-gradient-to-r from-aeon to-aeon-dark shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-white">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <main class="flex-1">
                {{ $slot }}
            </main>

            <footer class="bg-white border-t border-aeon-soft">
                <div class="max-w-7xl mx-auto py-4 px-6 text-center text-sm text-gray-500">
                    &copy; {{ date('Y') }} {{ config('app.name') }} &middot; Tugas Digital Entrepreneurship
                </div>
            </footer>
        </div>
    </body>
</html>