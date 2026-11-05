<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tech Academy') }} — Login</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500;600;700&family=Orbitron:wght@600;700;900&display=swap" rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-slate-100 antialiased">
    <div class="min-h-screen flex flex-col bg-cyber-bg">

        <!-- Header -->
        <header class="border-b border-slate-800/80 bg-slate-950/80 backdrop-blur-xl sticky top-0 z-40 px-4 md:px-8 py-3.5">
            <div class="max-w-7xl mx-auto flex items-center justify-between">
                <a href="/" class="flex items-center gap-3">
                    <x-application-logo class="h-10 w-10" />
                    <div>
                        <span class="font-tech font-bold text-base md:text-lg tracking-wider bg-clip-text text-transparent bg-gradient-to-r from-cyan-400 via-indigo-300 to-purple-400">TECH ACADEMY</span>
                        <span id="sub-brand-label" class="block text-[10px] font-mono text-slate-400 tracking-widest uppercase">Student &amp; Admin Gateway</span>
                    </div>
                </a>

                <div class="hidden sm:flex items-center gap-2 px-3 py-1 rounded-full bg-slate-900 border border-slate-800 text-xs font-mono">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span class="text-slate-300">System <strong class="text-cyan-400">Online</strong></span>
                </div>
            </div>
        </header>

        <!-- Main -->
        <main class="flex-1 relative flex items-center justify-center p-4 md:p-8 cyber-grid overflow-hidden">
            <div id="orb-primary" class="absolute top-1/4 left-1/6 w-96 h-96 bg-cyan-500/15 rounded-full blur-[120px] pointer-events-none animate-pulse transition-all duration-500"></div>
            <div id="orb-secondary" class="absolute bottom-1/4 right-1/6 w-96 h-96 bg-indigo-600/15 rounded-full blur-[120px] pointer-events-none animate-pulse transition-all duration-500" style="animation-delay: -3s;"></div>

            <div class="w-full max-w-6xl grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative z-10 py-4">

                <!-- Hero -->
                <div class="lg:col-span-5 text-center lg:text-left space-y-6">
                    <div id="hero-badge" class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-slate-900/90 border border-cyan-500/30 text-cyan-300 text-xs font-mono transition-all duration-300">
                        <i id="hero-badge-icon" class="fa-solid fa-sparkles text-cyan-400"></i>
                        <span id="hero-badge-text">STUDENT LEARNING HUB</span>
                    </div>

                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white leading-tight">
                        Welcome Back, <br>
                        <span id="hero-title-accent" class="bg-clip-text text-transparent bg-gradient-to-r from-cyan-400 via-indigo-300 to-purple-400">Tech Academy</span>
                    </h1>

                    <p id="hero-desc" class="text-slate-400 text-sm md:text-base leading-relaxed max-w-lg mx-auto lg:mx-0 transition-all duration-300">
                        Access your student records, subjects, and enrollment status — all in one secure portal.
                    </p>

                    <div class="grid grid-cols-2 gap-3 pt-2 max-w-md mx-auto lg:mx-0 text-left">
                        <div class="p-3 rounded-xl bg-slate-900/60 border border-slate-800 backdrop-blur-md flex items-center gap-3">
                            <div id="hero-card-icon-1" class="w-8 h-8 rounded-lg bg-cyan-500/10 flex items-center justify-center text-cyan-400 text-sm transition-all duration-300">
                                <i class="fa-solid fa-user-graduate"></i>
                            </div>
                            <div>
                                <div id="hero-card-title-1" class="text-xs font-bold text-white transition-all duration-300">Student Records</div>
                                <div id="hero-card-sub-1" class="text-[10px] text-slate-400 transition-all duration-300">Live enrollment data</div>
                            </div>
                        </div>
                        <div class="p-3 rounded-xl bg-slate-900/60 border border-slate-800 backdrop-blur-md flex items-center gap-3">
                            <div id="hero-card-icon-2" class="w-8 h-8 rounded-lg bg-indigo-500/10 flex items-center justify-center text-indigo-400 text-sm transition-all duration-300">
                                <i class="fa-solid fa-book"></i>
                            </div>
                            <div>
                                <div id="hero-card-title-2" class="text-xs font-bold text-white transition-all duration-300">Subjects</div>
                                <div id="hero-card-sub-2" class="text-[10px] text-slate-400 transition-all duration-300">Curriculum management</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Login Card -->
                <div class="lg:col-span-7 flex justify-center">
                    <div class="w-full max-w-md">
                        <div id="main-login-card" class="glow-student bg-slate-900/85 border rounded-3xl p-6 sm:p-8 backdrop-blur-2xl relative overflow-hidden transition-all duration-300">
                            <div id="top-accent-bar" class="absolute top-0 left-0 right-0 h-1 animated-border-student"></div>

                            <!-- Portal switcher (visual only — both tabs sign in through the same secure form) -->
                            <div class="mb-6">
                                <label class="block text-[11px] font-mono text-center uppercase tracking-widest text-slate-400 mb-2">
                                    Select Access Gateway
                                </label>
                                <div class="grid grid-cols-2 gap-2 p-1.5 bg-slate-950/90 rounded-2xl border border-slate-800/80 font-tech">
                                    <button type="button" onclick="switchPortal('student')" id="tab-student" class="py-2.5 px-3 rounded-xl font-bold text-xs tracking-wider transition-all duration-300 flex items-center justify-center gap-2 bg-gradient-to-r from-cyan-500 to-indigo-600 text-white shadow-lg shadow-cyan-500/20">
                                        <i class="fa-solid fa-user-graduate text-sm"></i>
                                        <span>STUDENT</span>
                                    </button>
                                    <button type="button" onclick="switchPortal('admin')" id="tab-admin" class="py-2.5 px-3 rounded-xl font-bold text-xs tracking-wider transition-all duration-300 flex items-center justify-center gap-2 text-slate-400 hover:text-white hover:bg-slate-900/60">
                                        <i class="fa-solid fa-user-shield text-sm"></i>
                                        <span>ADMIN</span>
                                    </button>
                                </div>
                            </div>

                            <div id="admin-security-notice" class="hidden mb-5 p-3 rounded-xl bg-rose-950/40 border border-rose-500/30 text-rose-300 text-xs font-mono flex items-center gap-2.5">
                                <i class="fa-solid fa-triangle-exclamation text-rose-400 text-base"></i>
                                <div>
                                    <div class="font-bold uppercase text-[11px] text-rose-200">Restricted Access</div>
                                    <div class="text-[10px] text-rose-300/80">Administrator accounts only. Create/edit/delete actions require this role.</div>
                                </div>
                            </div>

                            <!-- Session Status -->
                            <x-auth-session-status class="mb-4 block text-center" :status="session('status')" />

                            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                                @csrf

                                <!-- Email Address -->
                                <div>
                                    <label id="input-label-1" for="email" class="block text-xs font-mono uppercase text-cyan-400 mb-1.5">Email Address</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-500">
                                            <i id="input-icon-1" class="fa-solid fa-id-card text-cyan-400"></i>
                                        </div>
                                        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                                            placeholder="student@techacademy.edu"
                                            class="w-full pl-10 pr-4 py-3 bg-slate-950/80 border border-slate-800 focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 rounded-xl text-white text-sm placeholder-slate-600 focus:outline-none font-mono transition">
                                    </div>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <!-- Password -->
                                <div>
                                    <div class="flex justify-between items-center mb-1.5">
                                        <label id="input-label-2" for="password" class="text-xs font-mono uppercase text-cyan-400">Password</label>
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}" id="forgot-link" class="text-[11px] font-mono text-indigo-400 hover:text-indigo-300 transition">Forgot Password?</a>
                                        @endif
                                    </div>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-500">
                                            <i id="input-icon-2" class="fa-solid fa-lock text-indigo-400"></i>
                                        </div>
                                        <input type="password" id="password" name="password" required autocomplete="current-password"
                                            placeholder="••••••••••••"
                                            class="w-full pl-10 pr-10 py-3 bg-slate-950/80 border border-slate-800 focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 rounded-xl text-white text-sm placeholder-slate-600 focus:outline-none font-mono transition">
                                        <button type="button" onclick="togglePassword('password', this)" class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-500 hover:text-white transition">
                                            <i class="fa-regular fa-eye"></i>
                                        </button>
                                    </div>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <!-- Remember Me -->
                                <div class="flex items-center py-1">
                                    <label for="remember_me" class="inline-flex items-center gap-2 cursor-pointer">
                                        <input id="remember_me" type="checkbox" name="remember" class="w-4 h-4 rounded bg-slate-950 border-slate-700 text-cyan-500 focus:ring-cyan-400 focus:ring-offset-slate-900">
                                        <span class="text-xs text-slate-300 font-mono">{{ __('Remember me') }}</span>
                                    </label>
                                </div>

                                <button type="submit" id="submit-btn" class="w-full py-3.5 px-4 rounded-xl font-tech font-bold text-xs md:text-sm tracking-wider uppercase text-slate-950 bg-gradient-to-r from-cyan-400 via-teal-300 to-indigo-400 hover:from-cyan-300 hover:to-indigo-300 shadow-lg shadow-cyan-500/20 transition transform active:scale-95 flex items-center justify-center gap-2">
                                    <span id="btn-text">SIGN IN TO STUDENT PORTAL</span>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </button>
                            </form>

                            @if (Route::has('register'))
                                <p id="register-link-row" class="mt-6 text-center text-xs text-slate-500 font-mono">
                                    Don't have an account?
                                    <a href="{{ route('register') }}" class="font-semibold text-cyan-400 hover:text-cyan-300">Enroll Now</a>
                                </p>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <script>
        let currentPortal = 'student';

        function togglePassword(inputId, btn) {
            const input = document.getElementById(inputId);
            const icon = btn.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.className = 'fa-regular fa-eye-slash';
            } else {
                input.type = 'password';
                icon.className = 'fa-regular fa-eye';
            }
        }

        function switchPortal(mode) {
            if (currentPortal === mode) return;
            currentPortal = mode;

            const card = document.getElementById('main-login-card');
            const topBar = document.getElementById('top-accent-bar');
            const tabStudent = document.getElementById('tab-student');
            const tabAdmin = document.getElementById('tab-admin');

            const subBrand = document.getElementById('sub-brand-label');

            const heroBadge = document.getElementById('hero-badge');
            const heroBadgeIcon = document.getElementById('hero-badge-icon');
            const heroBadgeText = document.getElementById('hero-badge-text');
            const heroTitle = document.getElementById('hero-title-accent');
            const heroDesc = document.getElementById('hero-desc');

            const adminNotice = document.getElementById('admin-security-notice');

            const inputLabel1 = document.getElementById('input-label-1');
            const inputIcon1 = document.getElementById('input-icon-1');
            const emailInput = document.getElementById('email');

            const inputLabel2 = document.getElementById('input-label-2');
            const inputIcon2 = document.getElementById('input-icon-2');

            const submitBtn = document.getElementById('submit-btn');
            const btnText = document.getElementById('btn-text');

            const orbPrimary = document.getElementById('orb-primary');
            const orbSecondary = document.getElementById('orb-secondary');

            const registerRow = document.getElementById('register-link-row');

            if (mode === 'admin') {
                card.className = 'glow-admin bg-slate-900/85 border rounded-3xl p-6 sm:p-8 backdrop-blur-2xl relative overflow-hidden transition-all duration-300';
                topBar.className = 'absolute top-0 left-0 right-0 h-1 animated-border-admin';

                tabStudent.className = 'py-2.5 px-3 rounded-xl font-bold text-xs tracking-wider transition-all duration-300 flex items-center justify-center gap-2 text-slate-400 hover:text-white hover:bg-slate-900/60';
                tabAdmin.className = 'py-2.5 px-3 rounded-xl font-bold text-xs tracking-wider transition-all duration-300 flex items-center justify-center gap-2 bg-gradient-to-r from-rose-500 to-amber-500 text-white shadow-lg shadow-rose-500/20';

                subBrand.innerText = 'Administrative Control Panel';

                heroBadge.className = 'inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-slate-900/90 border border-rose-500/30 text-rose-300 text-xs font-mono transition-all duration-300';
                heroBadgeIcon.className = 'fa-solid fa-shield-halved text-rose-400';
                heroBadgeText.innerText = 'ADMINISTRATOR ACCESS';

                heroTitle.innerText = 'System Administrator';
                heroTitle.className = 'bg-clip-text text-transparent bg-gradient-to-r from-rose-400 via-amber-300 to-orange-400';

                heroDesc.innerText = 'Full control over students, subjects, enrollment, and staff accounts across Tech Academy.';

                document.getElementById('hero-card-icon-1').className = 'w-8 h-8 rounded-lg bg-rose-500/10 flex items-center justify-center text-rose-400 text-sm transition-all duration-300';
                document.getElementById('hero-card-icon-1').innerHTML = '<i class="fa-solid fa-user-gear"></i>';
                document.getElementById('hero-card-title-1').innerText = 'Full CRUD Access';
                document.getElementById('hero-card-sub-1').innerText = 'Create, edit, delete';

                document.getElementById('hero-card-icon-2').className = 'w-8 h-8 rounded-lg bg-amber-500/10 flex items-center justify-center text-amber-400 text-sm transition-all duration-300';
                document.getElementById('hero-card-icon-2').innerHTML = '<i class="fa-solid fa-shield-halved"></i>';
                document.getElementById('hero-card-title-2').innerText = 'Account Control';
                document.getElementById('hero-card-sub-2').innerText = 'Manage staff roles';

                adminNotice.classList.remove('hidden');

                inputLabel1.className = 'block text-xs font-mono uppercase text-rose-400 mb-1.5';
                inputIcon1.className = 'fa-solid fa-user-gear text-rose-400';
                emailInput.placeholder = 'admin@techacademy.edu';

                inputLabel2.className = 'text-xs font-mono uppercase text-rose-400';
                inputIcon2.className = 'fa-solid fa-key text-amber-400';

                submitBtn.className = 'w-full py-3.5 px-4 rounded-xl font-tech font-bold text-xs md:text-sm tracking-wider uppercase text-slate-950 bg-gradient-to-r from-rose-500 via-amber-400 to-orange-500 hover:from-rose-400 hover:to-orange-400 shadow-lg shadow-rose-500/20 transition transform active:scale-95 flex items-center justify-center gap-2';
                btnText.innerText = 'SIGN IN TO ADMIN PORTAL';

                orbPrimary.className = 'absolute top-1/4 left-1/6 w-96 h-96 bg-rose-500/15 rounded-full blur-[120px] pointer-events-none animate-pulse transition-all duration-500';
                orbSecondary.className = 'absolute bottom-1/4 right-1/6 w-96 h-96 bg-amber-600/15 rounded-full blur-[120px] pointer-events-none animate-pulse transition-all duration-500';

                if (registerRow) registerRow.classList.add('hidden');
            } else {
                card.className = 'glow-student bg-slate-900/85 border rounded-3xl p-6 sm:p-8 backdrop-blur-2xl relative overflow-hidden transition-all duration-300';
                topBar.className = 'absolute top-0 left-0 right-0 h-1 animated-border-student';

                tabStudent.className = 'py-2.5 px-3 rounded-xl font-bold text-xs tracking-wider transition-all duration-300 flex items-center justify-center gap-2 bg-gradient-to-r from-cyan-500 to-indigo-600 text-white shadow-lg shadow-cyan-500/20';
                tabAdmin.className = 'py-2.5 px-3 rounded-xl font-bold text-xs tracking-wider transition-all duration-300 flex items-center justify-center gap-2 text-slate-400 hover:text-white hover:bg-slate-900/60';

                subBrand.innerText = 'Student & Admin Gateway';

                heroBadge.className = 'inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-slate-900/90 border border-cyan-500/30 text-cyan-300 text-xs font-mono transition-all duration-300';
                heroBadgeIcon.className = 'fa-solid fa-sparkles text-cyan-400';
                heroBadgeText.innerText = 'STUDENT LEARNING HUB';

                heroTitle.innerText = 'Tech Academy';
                heroTitle.className = 'bg-clip-text text-transparent bg-gradient-to-r from-cyan-400 via-indigo-300 to-purple-400';

                heroDesc.innerText = 'Access your student records, subjects, and enrollment status — all in one secure portal.';

                document.getElementById('hero-card-icon-1').className = 'w-8 h-8 rounded-lg bg-cyan-500/10 flex items-center justify-center text-cyan-400 text-sm transition-all duration-300';
                document.getElementById('hero-card-icon-1').innerHTML = '<i class="fa-solid fa-user-graduate"></i>';
                document.getElementById('hero-card-title-1').innerText = 'Student Records';
                document.getElementById('hero-card-sub-1').innerText = 'Live enrollment data';

                document.getElementById('hero-card-icon-2').className = 'w-8 h-8 rounded-lg bg-indigo-500/10 flex items-center justify-center text-indigo-400 text-sm transition-all duration-300';
                document.getElementById('hero-card-icon-2').innerHTML = '<i class="fa-solid fa-book"></i>';
                document.getElementById('hero-card-title-2').innerText = 'Subjects';
                document.getElementById('hero-card-sub-2').innerText = 'Curriculum management';

                adminNotice.classList.add('hidden');

                inputLabel1.className = 'block text-xs font-mono uppercase text-cyan-400 mb-1.5';
                inputIcon1.className = 'fa-solid fa-id-card text-cyan-400';
                emailInput.placeholder = 'student@techacademy.edu';

                inputLabel2.className = 'text-xs font-mono uppercase text-cyan-400';
                inputIcon2.className = 'fa-solid fa-lock text-indigo-400';

                submitBtn.className = 'w-full py-3.5 px-4 rounded-xl font-tech font-bold text-xs md:text-sm tracking-wider uppercase text-slate-950 bg-gradient-to-r from-cyan-400 via-teal-300 to-indigo-400 hover:from-cyan-300 hover:to-indigo-300 shadow-lg shadow-cyan-500/20 transition transform active:scale-95 flex items-center justify-center gap-2';
                btnText.innerText = 'SIGN IN TO STUDENT PORTAL';

                orbPrimary.className = 'absolute top-1/4 left-1/6 w-96 h-96 bg-cyan-500/15 rounded-full blur-[120px] pointer-events-none animate-pulse transition-all duration-500';
                orbSecondary.className = 'absolute bottom-1/4 right-1/6 w-96 h-96 bg-indigo-600/15 rounded-full blur-[120px] pointer-events-none animate-pulse transition-all duration-500';

                if (registerRow) registerRow.classList.remove('hidden');
            }
        }
    </script>
</body>
</html>
