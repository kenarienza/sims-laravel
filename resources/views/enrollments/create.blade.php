<x-app-layout>
    <x-slot name="header">
        <h2 class="font-tech font-bold text-xl tracking-wide text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-indigo-300 to-purple-400 uppercase leading-tight">
            {{ __('Enroll Student') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="cyber-glow bg-slate-900/80 border border-purple-500/20 rounded-2xl backdrop-blur-xl p-6">
                <form method="POST" action="{{ route('enrollments.store') }}" class="space-y-4">
                    @csrf
                    @include('enrollments._form')

                    <div class="flex justify-end gap-3 pt-2">
                        <a href="{{ route('enrollments.index') }}" class="px-4 py-2.5 text-xs font-mono uppercase tracking-wider text-slate-500 hover:text-slate-300 transition">{{ __('Cancel') }}</a>
                        <x-primary-button>{{ __('Save Enrollment') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
