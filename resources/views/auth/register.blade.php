<x-guest-layout>
    <div class="text-center mb-6">
        <h1 class="font-tech text-2xl font-bold tracking-wide text-white uppercase">Enroll Now</h1>
        <p class="text-slate-400 text-xs font-mono mt-1">NEW ACCOUNT &bull; TECH ACADEMY PORTAL</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- Name / Surname -->
        <div class="grid grid-cols-2 gap-3">
            <div>
                <label for="first_name" class="block text-xs font-mono uppercase text-cyan-400 mb-1.5">{{ __('Name') }}</label>
                <input id="first_name" type="text" name="first_name" value="{{ old('first_name') }}" required autofocus autocomplete="given-name"
                    placeholder="Juan"
                    class="w-full px-4 py-2.5 bg-slate-950/70 border border-slate-700 focus:border-cyan-400 rounded-xl text-white text-sm placeholder-slate-600 focus:outline-none focus:ring-1 focus:ring-cyan-400 font-mono transition">
                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            </div>

            <div>
                <label for="last_name" class="block text-xs font-mono uppercase text-cyan-400 mb-1.5">{{ __('Surname') }}</label>
                <input id="last_name" type="text" name="last_name" value="{{ old('last_name') }}" required autocomplete="family-name"
                    placeholder="Dela Cruz"
                    class="w-full px-4 py-2.5 bg-slate-950/70 border border-slate-700 focus:border-cyan-400 rounded-xl text-white text-sm placeholder-slate-600 focus:outline-none focus:ring-1 focus:ring-cyan-400 font-mono transition">
                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
            </div>
        </div>

        <!-- Middle Initial / Contact Number -->
        <div class="grid grid-cols-3 gap-3">
            <div>
                <label for="middle_initial" class="block text-xs font-mono uppercase text-cyan-400 mb-1.5">{{ __('M.I.') }}</label>
                <input id="middle_initial" type="text" name="middle_initial" value="{{ old('middle_initial') }}" maxlength="5" autocomplete="additional-name"
                    placeholder="S."
                    class="w-full px-4 py-2.5 bg-slate-950/70 border border-slate-700 focus:border-cyan-400 rounded-xl text-white text-sm placeholder-slate-600 focus:outline-none focus:ring-1 focus:ring-cyan-400 font-mono transition">
                <x-input-error :messages="$errors->get('middle_initial')" class="mt-2" />
            </div>

            <div class="col-span-2">
                <label for="contact_number" class="block text-xs font-mono uppercase text-cyan-400 mb-1.5">{{ __('Contact Number') }}</label>
                <input id="contact_number" type="tel" name="contact_number" value="{{ old('contact_number') }}" required autocomplete="tel"
                    placeholder="09171234567"
                    class="w-full px-4 py-2.5 bg-slate-950/70 border border-slate-700 focus:border-cyan-400 rounded-xl text-white text-sm placeholder-slate-600 focus:outline-none focus:ring-1 focus:ring-cyan-400 font-mono transition">
                <x-input-error :messages="$errors->get('contact_number')" class="mt-2" />
            </div>
        </div>

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-xs font-mono uppercase text-cyan-400 mb-1.5">{{ __('Email') }}</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                placeholder="you@techacademy.edu"
                class="w-full px-4 py-2.5 bg-slate-950/70 border border-slate-700 focus:border-cyan-400 rounded-xl text-white text-sm placeholder-slate-600 focus:outline-none focus:ring-1 focus:ring-cyan-400 font-mono transition">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-xs font-mono uppercase text-cyan-400 mb-1.5">{{ __('Password') }}</label>
            <input id="password" type="password" name="password" required autocomplete="new-password"
                placeholder="••••••••••••"
                class="w-full px-4 py-2.5 bg-slate-950/70 border border-slate-700 focus:border-cyan-400 rounded-xl text-white text-sm placeholder-slate-600 focus:outline-none focus:ring-1 focus:ring-cyan-400 font-mono transition">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block text-xs font-mono uppercase text-cyan-400 mb-1.5">{{ __('Confirm Password') }}</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                placeholder="••••••••••••"
                class="w-full px-4 py-2.5 bg-slate-950/70 border border-slate-700 focus:border-cyan-400 rounded-xl text-white text-sm placeholder-slate-600 focus:outline-none focus:ring-1 focus:ring-cyan-400 font-mono transition">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Register Button -->
        <button type="submit"
            class="w-full py-3 px-4 rounded-xl font-tech font-bold text-sm tracking-wider uppercase text-slate-950 bg-gradient-to-r from-cyan-400 via-teal-300 to-purple-400 hover:from-cyan-300 hover:to-purple-300 shadow-lg shadow-cyan-500/25 transition transform active:scale-95 flex items-center justify-center gap-2">
            <span>{{ __('Register') }}</span>
        </button>
    </form>

    <p class="mt-6 text-center text-xs text-slate-500 font-mono">
        Already registered?
        <a href="{{ route('login') }}" class="font-semibold text-cyan-400 hover:text-cyan-300">{{ __('Log in') }}</a>
    </p>
</x-guest-layout>
