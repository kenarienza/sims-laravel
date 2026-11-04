<x-guest-layout>
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Login</h1>
        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
            Enter your account details to access the student portal.
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-brand-600 shadow-sm focus:ring-brand-500 dark:focus:ring-brand-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        @if (Route::has('password.request'))
            <div class="mt-3 text-right">
                <a class="underline text-sm text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-500 dark:focus:ring-offset-gray-900" href="{{ route('password.request') }}">
                    {{ __('Forgot Password?') }}
                </a>
            </div>
        @endif

        <x-primary-button class="mt-6 w-full justify-center !normal-case !tracking-normal !text-sm !py-3">
            {{ __('Login') }}
        </x-primary-button>
    </form>

    @if (Route::has('register'))
        <p class="mt-8 text-sm text-gray-500 dark:text-gray-400">
            Don't have an account?
            <a href="{{ route('register') }}" class="font-semibold text-brand-600 dark:text-brand-400 hover:underline">Enroll Now</a>
        </p>
    @endif
</x-guest-layout>
