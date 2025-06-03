<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Intranet') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

 czpm0z-codex/remplacer-le-script-cdn-dans-app.blade.php
    {{-- Tailwind via CDN --}}
    <script src="https://cdn.tailwindcss.com" integrity="sha384-w8fXw5bAcRpC5Hcps225y7sY9qsK0kGugHgd6Nq35p3xNmPR9U1FVLtZLkYI7Di5yucs5cjox96D65V+1GPLRA==" crossorigin="anonymous"></script>

    {{-- Tailwind via CDN if assets are not compiled --}}
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        {{-- Compiled assets via Vite --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com" integrity="sha384-w8fXw5bAcRpC5Hcps225y7sY9qsK0kGugHgd6Nq35p3xNmPR9U1FVLtZLkYI7Di5yucs5cjox96D65V+1GPLRA==" crossorigin="anonymous"></script>
    @endif
main
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 flex">
        @include('layouts.navigation')
        <div class="flex-1">
            <!-- Page Heading -->
            @hasSection('header')
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        @yield('header')
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="p-4">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
