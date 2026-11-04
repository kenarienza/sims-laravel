<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'NexusEd') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen grid lg:grid-cols-2 bg-gray-950">

            <!-- Left: auth card -->
            <div class="flex flex-col justify-center items-center p-6 sm:p-12 lg:p-16">
                <div class="w-full max-w-sm">
                    <div class="flex items-center gap-2.5 mb-10">
                        <a href="/" class="flex items-center gap-2.5">
                            <x-application-logo class="h-9 w-9" />
                            <span class="font-bold text-lg tracking-tight text-white">Nexus<span class="text-brand-400">Ed</span></span>
                        </a>
                    </div>

                    {{ $slot }}
                </div>
            </div>

            <!-- Right: brand / illustration panel -->
            <div class="relative hidden lg:flex flex-col justify-center overflow-hidden bg-gradient-to-br from-brand-600 via-brand-700 to-brand-900 p-16">
                <svg class="absolute inset-0 w-full h-full -z-0" viewBox="0 0 800 800" preserveAspectRatio="xMidYMid slice" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 120C120 20 260 -20 420 40C580 100 620 260 760 260C840 260 800 440 760 540C720 640 560 720 400 700C240 680 160 760 40 720C-80 680 -100 500 -40 380C20 260 -60 200 0 120Z" fill="white" fill-opacity="0.06"/>
                    <circle cx="640" cy="140" r="90" fill="white" fill-opacity="0.08"/>
                    <circle cx="90" cy="650" r="130" fill="white" fill-opacity="0.05"/>
                </svg>

                <div class="relative z-10 max-w-md">
                    <h2 class="text-4xl font-extrabold text-white leading-tight">
                        Welcome to the<br />Student Portal
                    </h2>
                    <p class="mt-4 text-brand-100">
                        Manage enrollment, track subjects, and stay on top of your
                        academic records — all from one NexusEd account.
                    </p>
                </div>

                <!-- Simple flat illustration -->
                <div class="relative z-10 mt-12">
                    <svg viewBox="0 0 420 300" class="w-full max-w-md" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="30" y="40" width="220" height="170" rx="16" fill="white" fill-opacity="0.12"/>
                        <rect x="55" y="70" width="140" height="12" rx="6" fill="white" fill-opacity="0.65"/>
                        <rect x="55" y="98" width="170" height="10" rx="5" fill="white" fill-opacity="0.35"/>
                        <rect x="55" y="118" width="170" height="10" rx="5" fill="white" fill-opacity="0.35"/>
                        <rect x="55" y="138" width="110" height="10" rx="5" fill="white" fill-opacity="0.35"/>
                        <circle cx="300" cy="90" r="46" fill="white" fill-opacity="0.18"/>
                        <path d="M300 68L330 82V98C330 112 316 124 300 128C284 124 270 112 270 98V82L300 68Z" fill="white" fill-opacity="0.85"/>
                        <rect x="245" y="170" width="130" height="90" rx="14" fill="white" fill-opacity="0.14"/>
                        <circle cx="275" cy="200" r="10" fill="white" fill-opacity="0.7"/>
                        <rect x="295" y="194" width="90" height="8" rx="4" fill="white" fill-opacity="0.5"/>
                        <rect x="295" y="210" width="60" height="8" rx="4" fill="white" fill-opacity="0.35"/>
                        <rect x="262" y="232" width="100" height="10" rx="5" fill="white" fill-opacity="0.3"/>
                    </svg>
                </div>
            </div>
        </div>
    </body>
</html>
