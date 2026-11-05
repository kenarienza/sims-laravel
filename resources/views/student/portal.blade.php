<x-app-layout>
    <x-slot name="header">
        <h2 class="font-tech font-bold text-xl tracking-wide text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-indigo-300 to-purple-400 uppercase leading-tight">
            {{ __('My Portal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="relative p-6 rounded-3xl bg-slate-900/80 border border-slate-800 backdrop-blur-xl glow-student overflow-hidden">
                <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-cyan-500/10 rounded-full blur-3xl pointer-events-none"></div>
                <div class="relative z-10 flex flex-col md:flex-row md:items-center gap-4">
                    <x-student-avatar :student="$student" size="lg" />
                    <div class="space-y-1">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-cyan-950/60 border border-cyan-500/30 text-cyan-300 text-xs font-mono">
                            <span class="w-2 h-2 rounded-full bg-cyan-400 animate-pulse"></span>
                            <span>Student Access</span>
                        </div>
                        <h1 class="text-2xl md:text-3xl font-bold font-tech text-white">
                            Welcome back, <span class="bg-clip-text text-transparent bg-gradient-to-r from-cyan-400 to-indigo-300">{{ $student->first_name }}</span>
                        </h1>
                        <p class="text-xs md:text-sm text-slate-400">Here's your enrollment record at Tech Academy.</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="p-4 rounded-2xl bg-slate-900/60 border border-slate-800/80 backdrop-blur-md">
                    <div class="text-[11px] font-mono text-slate-400 uppercase">{{ __('Student Number') }}</div>
                    <div class="text-lg font-bold font-tech text-white mt-1">{{ $student->student_number }}</div>
                </div>
                <div class="p-4 rounded-2xl bg-slate-900/60 border border-slate-800/80 backdrop-blur-md">
                    <div class="text-[11px] font-mono text-slate-400 uppercase">{{ __('Course') }}</div>
                    <div class="text-lg font-bold font-tech text-cyan-300 mt-1">{{ $student->course }}</div>
                </div>
                <div class="p-4 rounded-2xl bg-slate-900/60 border border-slate-800/80 backdrop-blur-md">
                    <div class="text-[11px] font-mono text-slate-400 uppercase">{{ __('Year Level') }}</div>
                    <div class="text-lg font-bold font-tech text-indigo-300 mt-1">{{ $student->year_level }}</div>
                </div>
                <div class="p-4 rounded-2xl bg-slate-900/60 border border-slate-800/80 backdrop-blur-md">
                    <div class="text-[11px] font-mono text-slate-400 uppercase">{{ __('Active Enrollments') }}</div>
                    <div class="text-lg font-bold font-tech text-emerald-300 mt-1">{{ $student->enrollments->count() }}</div>
                </div>
            </div>

            @if ($student->course === 'Not Yet Assigned')
                <div class="px-4 py-3 rounded-xl bg-amber-950/40 border border-amber-500/30 text-amber-300 text-sm font-mono flex items-center gap-2">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    <span>Your course and year level have not been assigned yet. Please coordinate with the registrar/admin office.</span>
                </div>
            @endif

            <div class="cyber-glow bg-slate-900/80 border border-cyan-500/20 rounded-2xl backdrop-blur-xl overflow-hidden">
                <div class="p-6">
                    <h3 class="font-tech font-bold text-sm tracking-wider uppercase text-cyan-300 mb-5">{{ __('My Subjects') }}</h3>

                    @if ($student->enrollments->isEmpty())
                        <p class="text-slate-500 font-mono text-sm">{{ __('Not enrolled in any subject yet.') }}</p>
                    @else
                        <table class="min-w-full divide-y divide-slate-800">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 text-left text-xs font-mono font-medium text-cyan-400 uppercase tracking-wider">{{ __('Subject') }}</th>
                                    <th class="px-4 py-2 text-left text-xs font-mono font-medium text-cyan-400 uppercase tracking-wider">{{ __('School Year') }}</th>
                                    <th class="px-4 py-2 text-left text-xs font-mono font-medium text-cyan-400 uppercase tracking-wider">{{ __('Semester') }}</th>
                                    <th class="px-4 py-2 text-left text-xs font-mono font-medium text-cyan-400 uppercase tracking-wider">{{ __('Status') }}</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-800/80">
                                @foreach ($student->enrollments as $enrollment)
                                    <tr class="hover:bg-cyan-500/5 transition">
                                        <td class="px-4 py-3 text-sm text-slate-200">{{ $enrollment->subject->subject_code }} &mdash; {{ $enrollment->subject->subject_name }}</td>
                                        <td class="px-4 py-3 text-sm font-mono text-slate-400">{{ $enrollment->school_year }}</td>
                                        <td class="px-4 py-3 text-sm font-mono text-slate-400">{{ $enrollment->semester }}</td>
                                        <td class="px-4 py-3">
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-mono font-semibold bg-emerald-500/10 text-emerald-300 border border-emerald-500/30 capitalize">
                                                {{ $enrollment->status->value }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
