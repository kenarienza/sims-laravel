<x-app-layout>
    <x-slot name="header">
        <h2 class="font-tech font-bold text-xl tracking-wide text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-indigo-300 to-purple-400 uppercase leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="cyber-glow bg-slate-900/80 border border-cyan-500/20 rounded-2xl backdrop-blur-xl p-4 sm:p-8">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="cyber-glow bg-slate-900/80 border border-indigo-500/20 rounded-2xl backdrop-blur-xl p-4 sm:p-8">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="bg-slate-900/80 border border-rose-500/30 rounded-2xl backdrop-blur-xl p-4 sm:p-8">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
