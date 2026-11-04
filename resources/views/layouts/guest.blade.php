<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
        <div class="min-h-screen grid lg:grid-cols-2">

            <!-- Left: branding / campus visual -->
            <div class="relative hidden lg:flex flex-col justify-between p-12 overflow-hidden">
                <div
                    class="absolute inset-0 -z-20 bg-cover bg-center"
                    style="background-image: url('https://images.unsplash.com/photo-1562774053-701939374585?auto=format&fit=crop&w=1600&q=80');"
                ></div>
                <div class="absolute inset-0 -z-10 bg-gradient-to-br from-brand-950/95 via-brand-900/90 to-gray-950/95"></div>
                <div class="absolute inset-0 -z-10 bg-[radial-gradient(circle_at_bottom_left,_rgba(51,189,255,0.2),_transparent_55%)]"></div>

                <a href="/" class="flex items-center gap-2.5 text-white">
                    <x-application-logo class="h-10 w-10" />
                    <span class="font-bold text-xl tracking-tight">Nexus<span class="text-brand-400">Ed</span></span>
                </a>

                <div class="text-white max-w-md">
                    <h2 class="text-3xl font-extrabold leading-tight">
                        Your academic journey, <span class="text-brand-300">all in one portal.</span>
                    </h2>
                    <p class="mt-4 text-gray-300">
                        Access enrollment, subjects, and your student records securely,
                        anytime, anywhere.
                    </p>
                </div>

                <p class="text-sm text-gray-400">&copy; {{ date('Y') }} NexusEd College</p>
            </div>

            <!-- Right: auth card -->
            <div class="flex flex-col justify-center items-center p-6 sm:p-12 bg-gray-50 dark:bg-gray-900">
                <div class="w-full max-w-md">
                    <div class="flex flex-col items-center gap-2 mb-8 lg:hidden">
                        <a href="/" class="flex items-center gap-2.5">
                            <x-application-logo class="h-10 w-10" />
                            <span class="font-bold text-xl tracking-tight text-gray-900 dark:text-white">Nexus<span class="text-brand-500">Ed</span></span>
                        </a>
                    </div>

                    <div class="bg-white dark:bg-gray-800 shadow-xl shadow-gray-900/5 rounded-2xl p-8">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
