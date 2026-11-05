<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Tech Academy') }} — Student Information Management System</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-950 text-white">

        <!-- Hero -->
        <div class="relative isolate overflow-hidden min-h-screen flex flex-col">
            <div
                class="absolute inset-0 -z-20 bg-cover bg-center"
                style="background-image: url('https://images.unsplash.com/photo-1562774053-701939374585?auto=format&fit=crop&w=2000&q=80');"
            ></div>
            <div class="absolute inset-0 -z-10 bg-gradient-to-br from-gray-950/95 via-brand-950/90 to-gray-950/95"></div>
            <div class="absolute inset-0 -z-10 bg-[radial-gradient(circle_at_top_right,_rgba(51,189,255,0.18),_transparent_55%)]"></div>

            <!-- Nav -->
            <header class="w-full">
                <nav class="max-w-7xl mx-auto px-6 lg:px-8 flex items-center justify-between h-20">
                    <a href="/" class="flex items-center gap-2.5">
                        <x-application-logo class="h-10 w-10" />
                        <span class="font-bold text-xl tracking-tight">Tech<span class="text-brand-400">Academy</span></span>
                    </a>

                    <div class="flex items-center gap-3">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="inline-flex items-center px-5 py-2 rounded-lg bg-brand-500 hover:bg-brand-400 text-gray-950 font-semibold text-sm transition">
                                Go to Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="inline-flex items-center px-5 py-2 rounded-lg border border-white/20 hover:border-white/40 text-white font-medium text-sm transition">
                                Login
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="inline-flex items-center px-5 py-2 rounded-lg bg-brand-500 hover:bg-brand-400 text-gray-950 font-semibold text-sm transition">
                                    Enroll Now
                                </a>
                            @endif
                        @endauth
                    </div>
                </nav>
            </header>

            <!-- Hero content -->
            <div class="flex-1 flex items-center">
                <div class="max-w-7xl mx-auto px-6 lg:px-8 py-16 grid lg:grid-cols-2 gap-12 items-center w-full">
                    <div>
                        <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 border border-white/10 text-xs font-semibold tracking-wide uppercase text-brand-300">
                            Tech Academy · Student Portal
                        </span>

                        <h1 class="mt-6 text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-[1.05]">
                            Where Innovation
                            <span class="bg-gradient-to-r from-brand-300 to-brand-500 bg-clip-text text-transparent">Meets Education.</span>
                        </h1>

                        <p class="mt-6 text-lg text-gray-300 max-w-xl">
                            Tech Academy's Student Information Management System connects admissions,
                            academics, and student records in one modern, secure platform —
                            built for the next generation of learners.
                        </p>

                        <div class="mt-10 flex flex-wrap items-center gap-4">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="inline-flex items-center justify-center px-7 py-3.5 rounded-xl bg-brand-500 hover:bg-brand-400 text-gray-950 font-semibold transition shadow-lg shadow-brand-500/20">
                                    Go to Dashboard
                                </a>
                            @else
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-7 py-3.5 rounded-xl bg-brand-500 hover:bg-brand-400 text-gray-950 font-semibold transition shadow-lg shadow-brand-500/20">
                                        Enroll Now
                                    </a>
                                @endif
                                <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-7 py-3.5 rounded-xl border border-white/20 hover:border-white/40 hover:bg-white/5 font-semibold transition">
                                    Login to Portal
                                </a>
                            @endauth
                        </div>

                        <dl class="mt-14 grid grid-cols-3 gap-6 max-w-md">
                            <div>
                                <dt class="text-2xl font-bold text-brand-300">24/7</dt>
                                <dd class="text-sm text-gray-400 mt-1">Portal Access</dd>
                            </div>
                            <div>
                                <dt class="text-2xl font-bold text-brand-300">REST</dt>
                                <dd class="text-sm text-gray-400 mt-1">API Integration</dd>
                            </div>
                            <div>
                                <dt class="text-2xl font-bold text-brand-300">100%</dt>
                                <dd class="text-sm text-gray-400 mt-1">Digital Records</dd>
                            </div>
                        </dl>
                    </div>

                    <!-- Feature cards -->
                    <div class="grid sm:grid-cols-2 gap-5">
                        <div class="rounded-2xl bg-white/[0.04] border border-white/10 backdrop-blur p-6 hover:bg-white/[0.07] transition">
                            <div class="h-11 w-11 rounded-xl bg-brand-500/15 flex items-center justify-center text-brand-300">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.42A12.02 12.02 0 0122 12c0 2.7-1.1 5.14-2.88 6.9M12 14v7m0-7l-6.16-3.42A12.02 12.02 0 002 12c0 2.7 1.1 5.14 2.88 6.9" /></svg>
                            </div>
                            <h3 class="mt-4 font-semibold text-white">Student Records</h3>
                            <p class="mt-1.5 text-sm text-gray-400">Manage enrollment, courses, and academic history in one place.</p>
                        </div>

                        <div class="rounded-2xl bg-white/[0.04] border border-white/10 backdrop-blur p-6 hover:bg-white/[0.07] transition">
                            <div class="h-11 w-11 rounded-xl bg-brand-500/15 flex items-center justify-center text-brand-300">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                            </div>
                            <h3 class="mt-4 font-semibold text-white">Subject Catalog</h3>
                            <p class="mt-1.5 text-sm text-gray-400">Browse available subjects and units each academic term.</p>
                        </div>

                        <div class="rounded-2xl bg-white/[0.04] border border-white/10 backdrop-blur p-6 hover:bg-white/[0.07] transition">
                            <div class="h-11 w-11 rounded-xl bg-brand-500/15 flex items-center justify-center text-brand-300">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2a4 4 0 014-4h3m0 0l-3-3m3 3l-3 3M4 7a2 2 0 012-2h4l2 2h8a2 2 0 012 2v9a2 2 0 01-2 2H6a2 2 0 01-2-2V7z" /></svg>
                            </div>
                            <h3 class="mt-4 font-semibold text-white">Live Enrollment</h3>
                            <p class="mt-1.5 text-sm text-gray-400">Enroll and track status across semesters in real time.</p>
                        </div>

                        <div class="rounded-2xl bg-white/[0.04] border border-white/10 backdrop-blur p-6 hover:bg-white/[0.07] transition">
                            <div class="h-11 w-11 rounded-xl bg-brand-500/15 flex items-center justify-center text-brand-300">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                            </div>
                            <h3 class="mt-4 font-semibold text-white">Secure Access</h3>
                            <p class="mt-1.5 text-sm text-gray-400">Role-based accounts for administrators and staff.</p>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="border-t border-white/10">
                <div class="max-w-7xl mx-auto px-6 lg:px-8 py-6 flex flex-col sm:flex-row items-center justify-between gap-3 text-sm text-gray-500">
                    <span>&copy; {{ date('Y') }} Tech Academy. All rights reserved.</span>
                    <span>Student Information Management System</span>
                </div>
            </footer>
        </div>
    </body>
</html>
