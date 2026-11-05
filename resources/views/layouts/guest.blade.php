<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Tech Academy') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500;700&family=Orbitron:wght@500;700;900&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-100 antialiased">
        <div class="min-h-screen flex items-center justify-center bg-cyber-bg cyber-grid relative overflow-hidden p-4">
            <!-- Background glow effects -->
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-purple-600/20 rounded-full blur-3xl pointer-events-none animate-pulse"></div>
            <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-cyan-500/20 rounded-full blur-3xl pointer-events-none animate-pulse" style="animation-delay: 1.5s;"></div>

            <div class="w-full max-w-md relative z-10">
                <!-- Header badge + logo -->
                <div class="text-center mb-6">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-cyan-950/80 border border-cyan-500/40 text-cyan-400 text-xs font-mono mb-4">
                        <span class="w-2 h-2 rounded-full bg-cyan-400 animate-ping"></span>
                        <span>TECH ACADEMY · STUDENT PORTAL</span>
                    </div>
                    <a href="/" class="inline-flex items-center justify-center gap-2.5">
                        <x-application-logo class="h-9 w-9" />
                        <span class="font-tech text-xl font-bold tracking-wider text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-purple-300 to-pink-400 uppercase">Tech Academy</span>
                    </a>
                </div>

                <!-- Glass login card -->
                <div class="cyber-glow bg-slate-900/80 border border-cyan-500/30 rounded-2xl p-6 sm:p-8 backdrop-blur-xl relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-cyan-500 via-purple-500 to-pink-500"></div>

                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
