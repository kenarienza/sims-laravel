<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-tech font-bold text-xl tracking-wide text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-indigo-300 to-purple-400 uppercase leading-tight">
                {{ __('Subjects') }}
            </h2>

            @if (auth()->user()->isAdmin())
                <a href="{{ route('subjects.create') }}"
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-xl font-tech font-bold text-xs tracking-wider uppercase text-slate-950 bg-gradient-to-r from-cyan-400 via-teal-300 to-indigo-400 hover:from-cyan-300 hover:to-indigo-300 shadow-lg shadow-cyan-500/20 transition">
                    <i class="fa-solid fa-book-medical"></i>
                    {{ __('Add Subject') }}
                </a>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
            @if (session('status'))
                <div class="px-4 py-3 rounded-xl bg-emerald-950/40 border border-emerald-500/30 text-emerald-300 text-sm font-mono">
                    {{ session('status') }}
                </div>
            @endif

            <div class="cyber-glow bg-slate-900/80 border border-indigo-500/20 rounded-2xl backdrop-blur-xl overflow-hidden">
                <table class="min-w-full divide-y divide-slate-800">
                    <thead class="bg-slate-950/80">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-mono font-medium text-indigo-400 uppercase tracking-wider">{{ __('Code') }}</th>
                            <th class="px-6 py-3 text-left text-xs font-mono font-medium text-indigo-400 uppercase tracking-wider">{{ __('Name') }}</th>
                            <th class="px-6 py-3 text-left text-xs font-mono font-medium text-indigo-400 uppercase tracking-wider">{{ __('Units') }}</th>
                            <th class="px-6 py-3"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800/80">
                        @forelse ($subjects as $subject)
                            <tr class="hover:bg-indigo-500/5 transition">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-mono font-semibold bg-indigo-500/10 text-indigo-300 border border-indigo-500/30">
                                        {{ $subject->subject_code }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">{{ $subject->subject_name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap font-mono text-sm text-slate-400">{{ $subject->units }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right space-x-3">
                                    @if (auth()->user()->isAdmin())
                                        <a href="{{ route('subjects.edit', $subject) }}" class="text-xs font-mono uppercase tracking-wider text-indigo-400 hover:text-indigo-300">{{ __('Edit') }}</a>
                                        <form action="{{ route('subjects.destroy', $subject) }}" method="POST" class="inline" onsubmit="return confirm('{{ __('Delete this subject?') }}')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-xs font-mono uppercase tracking-wider text-rose-400 hover:text-rose-300">{{ __('Delete') }}</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-10 text-center text-slate-500 font-mono text-sm">{{ __('No subjects found.') }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="text-slate-400 [&_a]:text-cyan-400 [&_a:hover]:text-cyan-300 [&_span]:text-slate-600">
                {{ $subjects->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
