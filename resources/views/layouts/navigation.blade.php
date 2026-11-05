<nav x-data="{ open: false }" class="bg-slate-950/90 backdrop-blur-xl border-b border-slate-800 sticky top-0 z-40">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center gap-2">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
                        <x-application-logo class="block h-9 w-9" />
                        <span class="font-tech font-bold text-lg tracking-wider bg-clip-text text-transparent bg-gradient-to-r from-cyan-400 via-indigo-300 to-purple-400">TECH ACADEMY</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    @unless (Auth::user()->isStudent())
                        <x-nav-link :href="route('students.index')" :active="request()->routeIs('students.*')">
                            {{ __('Students') }}
                        </x-nav-link>
                        <x-nav-link :href="route('subjects.index')" :active="request()->routeIs('subjects.*')">
                            {{ __('Subjects') }}
                        </x-nav-link>
                        <x-nav-link :href="route('enrollments.index')" :active="request()->routeIs('enrollments.*')">
                            {{ __('Enrollments') }}
                        </x-nav-link>
                    @endunless
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6 gap-3">
                <x-dropdown align="right" width="48" content-classes="py-1 bg-slate-900 border border-slate-800">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center gap-2.5 px-2 py-1.5 border border-slate-800 text-xs leading-4 font-mono font-medium rounded-lg text-slate-300 bg-slate-900 hover:border-cyan-500/40 hover:text-cyan-300 focus:outline-none transition ease-in-out duration-150">
                            @php
                                $avatarTheme = match (true) {
                                    Auth::user()->isAdmin() => ['bg-gradient-to-tr from-rose-500 to-amber-500', 'text-rose-300'],
                                    Auth::user()->isStudent() => ['bg-gradient-to-tr from-emerald-500 to-cyan-600', 'text-emerald-300'],
                                    default => ['bg-gradient-to-tr from-cyan-500 to-indigo-600', 'text-cyan-300'],
                                };
                                $initials = collect(explode(' ', Auth::user()->name))->map(fn ($part) => mb_substr($part, 0, 1))->implode('');
                            @endphp
                            <div class="w-7 h-7 rounded-lg {{ $avatarTheme[0] }} p-0.5">
                                <div class="w-full h-full rounded-[7px] bg-slate-950 flex items-center justify-center font-tech font-bold {{ $avatarTheme[1] }} text-[10px]">
                                    {{ mb_strtoupper(mb_substr($initials, 0, 2)) }}
                                </div>
                            </div>
                            <div>{{ Auth::user()->name }}</div>

                            <div>
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}" class="border-l border-slate-800 pl-3">
                    @csrf
                    <button type="submit" class="inline-flex items-center gap-1.5 text-xs font-mono font-medium text-slate-500 hover:text-rose-400 transition">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span>{{ __('Logout') }}</span>
                    </button>
                </form>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-slate-400 hover:text-cyan-300 hover:bg-slate-900 focus:outline-none focus:bg-slate-900 focus:text-cyan-300 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-slate-950 border-t border-slate-800">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            @unless (Auth::user()->isStudent())
                <x-responsive-nav-link :href="route('students.index')" :active="request()->routeIs('students.*')">
                    {{ __('Students') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('subjects.index')" :active="request()->routeIs('subjects.*')">
                    {{ __('Subjects') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('enrollments.index')" :active="request()->routeIs('enrollments.*')">
                    {{ __('Enrollments') }}
                </x-responsive-nav-link>
            @endunless
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-slate-800">
            <div class="px-4">
                <div class="font-medium text-base text-slate-200">{{ Auth::user()->name }}</div>
                <div class="font-mono text-sm text-slate-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
