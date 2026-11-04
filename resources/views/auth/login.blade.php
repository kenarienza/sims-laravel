<x-guest-layout>
    <div class="mb-6 text-center">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Login to Your Account</h1>
        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
            Access the student portal, enrollment records, and dashboard.
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

        <div class="flex items-center justify-between mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3 !normal-case !tracking-normal !text-sm !px-6 !py-2.5">
                {{ __('Login') }}
            </x-primary-button>
        </div>
    </form>

    <div class="mt-8 rounded-xl bg-brand-50 dark:bg-brand-950/40 border border-brand-100 dark:border-brand-900 p-4">
        <p class="text-xs font-bold uppercase tracking-wide text-brand-700 dark:text-brand-300">Login Instructions</p>
        <ul class="mt-2 space-y-1 text-sm text-gray-600 dark:text-gray-400 list-disc list-inside">
            <li>Enter the <span class="font-medium text-gray-800 dark:text-gray-200">email</span> and <span class="font-medium text-gray-800 dark:text-gray-200">password</span> provided to you.</li>
            <li>New here? <a href="{{ route('register') }}" class="text-brand-600 dark:text-brand-400 underline">Enroll Now</a> to create a student account.</li>
            <li>For access issues, contact the NexusEd registrar's office.</li>
        </ul>
    </div>
</x-guest-layout>
