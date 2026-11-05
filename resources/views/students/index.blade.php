<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-tech font-bold text-xl tracking-wide text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-indigo-300 to-purple-400 uppercase leading-tight">
                {{ __('Students') }}
            </h2>

            @if (auth()->user()->isAdmin())
                <a href="{{ route('students.create') }}"
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-xl font-tech font-bold text-xs tracking-wider uppercase text-slate-950 bg-gradient-to-r from-cyan-400 via-teal-300 to-indigo-400 hover:from-cyan-300 hover:to-indigo-300 shadow-lg shadow-cyan-500/20 transition">
                    <i class="fa-solid fa-user-plus"></i>
                    {{ __('Add Student') }}
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

            <form method="GET" action="{{ route('students.index') }}" class="flex items-center gap-2">
                <div class="relative flex-1 max-w-sm">
                    <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-500 text-xs"></i>
                    <input type="text" name="search" value="{{ $search }}" placeholder="Search name, student no., or email..."
                        class="w-full pl-9 pr-3 py-2 bg-slate-950/80 border border-slate-800 focus:border-cyan-400 rounded-xl text-sm text-white placeholder-slate-500 focus:outline-none focus:ring-1 focus:ring-cyan-400 font-mono transition">
                </div>
                <button type="submit" class="px-4 py-2 rounded-xl bg-slate-900 border border-slate-800 hover:border-cyan-500/40 text-slate-300 hover:text-cyan-300 text-xs font-mono uppercase tracking-wider transition">
                    {{ __('Search') }}
                </button>
                @if ($search !== '')
                    <a href="{{ route('students.index') }}" class="px-4 py-2 rounded-xl text-slate-500 hover:text-slate-300 text-xs font-mono uppercase tracking-wider transition">
                        {{ __('Clear') }}
                    </a>
                @endif
            </form>

            <div class="cyber-glow bg-slate-900/80 border border-cyan-500/20 rounded-2xl backdrop-blur-xl overflow-hidden">
                <table class="min-w-full divide-y divide-slate-800">
                    <thead class="bg-slate-950/80">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-mono font-medium text-cyan-400 uppercase tracking-wider">{{ __('Student No.') }}</th>
                            <th class="px-6 py-3 text-left text-xs font-mono font-medium text-cyan-400 uppercase tracking-wider">{{ __('Name') }}</th>
                            <th class="px-6 py-3 text-left text-xs font-mono font-medium text-cyan-400 uppercase tracking-wider">{{ __('Email') }}</th>
                            <th class="px-6 py-3 text-left text-xs font-mono font-medium text-cyan-400 uppercase tracking-wider">{{ __('Course') }}</th>
                            <th class="px-6 py-3 text-left text-xs font-mono font-medium text-cyan-400 uppercase tracking-wider">{{ __('Year') }}</th>
                            <th class="px-6 py-3"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800/80">
                        @forelse ($students as $student)
                            <tr class="hover:bg-cyan-500/5 transition">
                                <td class="px-6 py-4 whitespace-nowrap font-mono text-sm text-slate-400">{{ $student->student_number }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ route('students.show', $student) }}" class="flex items-center gap-3 font-medium text-cyan-300 hover:text-cyan-200">
                                        <x-student-avatar :student="$student" size="sm" />
                                        <span class="hover:underline">{{ $student->fullName() }}</span>
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap font-mono text-sm text-slate-400">{{ $student->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-300">{{ $student->course }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-mono font-semibold bg-indigo-500/10 text-indigo-300 border border-indigo-500/30">
                                        {{ $student->year_level }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right space-x-3">
                                    @if (auth()->user()->isAdmin())
                                        <a href="{{ route('students.edit', $student) }}" class="text-xs font-mono uppercase tracking-wider text-indigo-400 hover:text-indigo-300">{{ __('Edit') }}</a>
                                        <form action="{{ route('students.destroy', $student) }}" method="POST" class="inline" onsubmit="return confirm('{{ __('Delete this student?') }}')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-xs font-mono uppercase tracking-wider text-rose-400 hover:text-rose-300">{{ __('Delete') }}</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-10 text-center text-slate-500 font-mono text-sm">{{ __('No students found.') }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="text-slate-400 [&_a]:text-cyan-400 [&_a:hover]:text-cyan-300 [&_span]:text-slate-600">
                {{ $students->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
