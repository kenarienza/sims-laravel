<x-app-layout>
    <x-slot name="header">
        <h2 class="font-tech font-bold text-xl tracking-wide text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-indigo-300 to-purple-400 uppercase leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if (auth()->user()->isAdmin())
                <div class="relative p-6 rounded-3xl bg-slate-900/90 border border-rose-500/30 backdrop-blur-xl glow-admin overflow-hidden">
                    <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-rose-500/10 rounded-full blur-3xl pointer-events-none"></div>
                    <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <div class="space-y-1">
                            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-rose-950/60 border border-rose-500/30 text-rose-300 text-xs font-mono">
                                <i class="fa-solid fa-shield-halved text-rose-400"></i>
                                <span>Administrator Access</span>
                            </div>
                            <h1 class="text-2xl md:text-3xl font-bold font-tech text-white">
                                Welcome back, <span class="bg-clip-text text-transparent bg-gradient-to-r from-rose-400 via-amber-300 to-orange-400">{{ Auth::user()->name }}</span>
                            </h1>
                            <p class="text-xs md:text-sm text-slate-400">Full control over students, subjects, and enrollment records across Tech Academy.</p>
                        </div>
                        <div class="flex flex-wrap items-center gap-2">
                            <a href="{{ route('students.create') }}" class="px-4 py-2.5 rounded-xl bg-gradient-to-r from-rose-500 to-amber-500 hover:from-rose-400 hover:to-amber-400 text-slate-950 font-tech font-bold text-xs tracking-wider uppercase transition shadow-lg shadow-rose-500/20 flex items-center gap-2">
                                <i class="fa-solid fa-user-plus"></i>
                                <span>Add Student</span>
                            </a>
                            <a href="{{ route('subjects.create') }}" class="px-3.5 py-2.5 rounded-xl bg-slate-950 border border-slate-800 hover:border-rose-500/40 text-slate-300 text-xs font-mono transition flex items-center gap-2">
                                <i class="fa-solid fa-book text-amber-400"></i>
                                <span>Add Subject</span>
                            </a>
                            <a href="{{ route('enrollments.create') }}" class="px-3.5 py-2.5 rounded-xl bg-slate-950 border border-slate-800 hover:border-rose-500/40 text-slate-300 text-xs font-mono transition flex items-center gap-2">
                                <i class="fa-solid fa-calendar-plus text-amber-400"></i>
                                <span>Record Enrollment</span>
                            </a>
                        </div>
                    </div>
                </div>
            @else
                <div class="relative p-6 rounded-3xl bg-slate-900/80 border border-slate-800 backdrop-blur-xl glow-student overflow-hidden">
                    <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-cyan-500/10 rounded-full blur-3xl pointer-events-none"></div>
                    <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <div class="space-y-1">
                            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-cyan-950/60 border border-cyan-500/30 text-cyan-300 text-xs font-mono">
                                <span class="w-2 h-2 rounded-full bg-cyan-400 animate-pulse"></span>
                                <span>Staff Access</span>
                            </div>
                            <h1 class="text-2xl md:text-3xl font-bold font-tech text-white">
                                Welcome back, <span class="bg-clip-text text-transparent bg-gradient-to-r from-cyan-400 to-indigo-300">{{ Auth::user()->name }}</span>
                            </h1>
                            <p class="text-xs md:text-sm text-slate-400">Browse student records, subjects, and enrollment status across Tech Academy.</p>
                        </div>
                        <div class="flex flex-wrap items-center gap-2">
                            <a href="{{ route('students.index') }}" class="px-4 py-2.5 rounded-xl bg-gradient-to-r from-cyan-400 to-indigo-500 hover:from-cyan-300 hover:to-indigo-400 text-slate-950 font-tech font-bold text-xs tracking-wider uppercase transition shadow-lg shadow-cyan-500/20 flex items-center gap-2">
                                <i class="fa-solid fa-user-graduate"></i>
                                <span>View Students</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endif

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                <a href="{{ route('students.index') }}" class="group relative overflow-hidden bg-slate-900/80 border border-cyan-500/20 rounded-2xl p-6 backdrop-blur-xl transition hover:border-cyan-400/60 hover:-translate-y-1 hover:shadow-lg hover:shadow-cyan-500/10">
                    <div class="absolute top-0 left-0 right-0 h-0.5 bg-gradient-to-r from-cyan-500 via-indigo-500 to-transparent"></div>
                    <div class="flex items-center justify-between text-xs font-mono uppercase tracking-widest text-cyan-400">
                        <span class="flex items-center gap-2">
                            <i class="fa-solid fa-user-graduate"></i>
                            {{ __('Total Students') }}
                        </span>
                        <i class="fa-solid fa-arrow-right opacity-0 group-hover:opacity-100 transition"></i>
                    </div>
                    <div class="mt-3 text-4xl font-tech font-bold text-white">{{ $stats['total_students'] }}</div>
                </a>

                <a href="{{ route('subjects.index') }}" class="group relative overflow-hidden bg-slate-900/80 border border-indigo-500/20 rounded-2xl p-6 backdrop-blur-xl transition hover:border-indigo-400/60 hover:-translate-y-1 hover:shadow-lg hover:shadow-indigo-500/10">
                    <div class="absolute top-0 left-0 right-0 h-0.5 bg-gradient-to-r from-indigo-500 via-purple-500 to-transparent"></div>
                    <div class="flex items-center justify-between text-xs font-mono uppercase tracking-widest text-indigo-400">
                        <span class="flex items-center gap-2">
                            <i class="fa-solid fa-book"></i>
                            {{ __('Total Subjects') }}
                        </span>
                        <i class="fa-solid fa-arrow-right opacity-0 group-hover:opacity-100 transition"></i>
                    </div>
                    <div class="mt-3 text-4xl font-tech font-bold text-white">{{ $stats['total_subjects'] }}</div>
                </a>

                <a href="{{ route('enrollments.index') }}" class="group relative overflow-hidden bg-slate-900/80 border border-purple-500/20 rounded-2xl p-6 backdrop-blur-xl transition hover:border-purple-400/60 hover:-translate-y-1 hover:shadow-lg hover:shadow-purple-500/10">
                    <div class="absolute top-0 left-0 right-0 h-0.5 bg-gradient-to-r from-purple-500 via-pink-500 to-transparent"></div>
                    <div class="flex items-center justify-between text-xs font-mono uppercase tracking-widest text-purple-400">
                        <span class="flex items-center gap-2">
                            <i class="fa-solid fa-calendar-check"></i>
                            {{ __('Total Enrollments') }}
                        </span>
                        <i class="fa-solid fa-arrow-right opacity-0 group-hover:opacity-100 transition"></i>
                    </div>
                    <div class="mt-3 text-4xl font-tech font-bold text-white">{{ $stats['total_enrollments'] }}</div>
                </a>

                <a href="{{ route('enrollments.index') }}" class="group relative overflow-hidden bg-slate-900/80 border border-emerald-500/20 rounded-2xl p-6 backdrop-blur-xl transition hover:border-emerald-400/60 hover:-translate-y-1 hover:shadow-lg hover:shadow-emerald-500/10">
                    <div class="absolute top-0 left-0 right-0 h-0.5 bg-gradient-to-r from-emerald-500 via-cyan-500 to-transparent"></div>
                    <div class="flex items-center justify-between text-xs font-mono uppercase tracking-widest text-emerald-400">
                        <span class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                            {{ __('Active Enrollments') }}
                        </span>
                        <i class="fa-solid fa-arrow-right opacity-0 group-hover:opacity-100 transition"></i>
                    </div>
                    <div class="mt-3 text-4xl font-tech font-bold text-white">{{ $stats['active_enrollments'] }}</div>
                </a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="cyber-glow bg-slate-900/80 border border-cyan-500/20 rounded-2xl backdrop-blur-xl overflow-hidden">
                    <div class="p-6">
                        <h3 class="font-tech font-bold text-sm tracking-wider uppercase text-cyan-300 mb-5">{{ __('Students by Year Level') }}</h3>

                        @if ($stats['students_by_year']->isEmpty())
                            <p class="text-slate-500 font-mono text-sm">{{ __('No students yet.') }}</p>
                        @else
                            @php $maxYear = $stats['students_by_year']->max(); @endphp
                            <ul class="space-y-4">
                                @foreach ($stats['students_by_year'] as $year => $total)
                                    <li>
                                        <div class="flex justify-between items-center mb-1.5 font-mono text-sm">
                                            <span class="text-slate-300">{{ __('Year') }} {{ $year }}</span>
                                            <span class="font-bold text-cyan-300">{{ $total }}</span>
                                        </div>
                                        <div class="h-2 rounded-full bg-slate-950/80 border border-slate-800 overflow-hidden">
                                            <div class="h-full rounded-full bg-gradient-to-r from-cyan-500 via-indigo-500 to-purple-500" style="width: {{ $maxYear > 0 ? max(4, round($total / $maxYear * 100)) : 0 }}%"></div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>

                <div class="cyber-glow bg-slate-900/80 border border-indigo-500/20 rounded-2xl backdrop-blur-xl overflow-hidden">
                    <div class="p-6">
                        <h3 class="font-tech font-bold text-sm tracking-wider uppercase text-indigo-300 mb-5">{{ __('Students by Course') }}</h3>

                        @if ($stats['students_by_course']->isEmpty())
                            <p class="text-slate-500 font-mono text-sm">{{ __('No students yet.') }}</p>
                        @else
                            @php $maxCourse = $stats['students_by_course']->max(); @endphp
                            <ul class="space-y-4">
                                @foreach ($stats['students_by_course'] as $course => $total)
                                    <li>
                                        <div class="flex justify-between items-center mb-1.5 font-mono text-sm">
                                            <span class="text-slate-300">{{ $course }}</span>
                                            <span class="font-bold text-indigo-300">{{ $total }}</span>
                                        </div>
                                        <div class="h-2 rounded-full bg-slate-950/80 border border-slate-800 overflow-hidden">
                                            <div class="h-full rounded-full bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500" style="width: {{ $maxCourse > 0 ? max(4, round($total / $maxCourse * 100)) : 0 }}%"></div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>

            @if (auth()->user()->isAdmin())
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div class="cyber-glow bg-slate-900/80 border border-rose-500/20 rounded-2xl backdrop-blur-xl overflow-hidden">
                        <div class="p-6">
                            <h3 class="font-tech font-bold text-sm tracking-wider uppercase text-rose-300 mb-5 flex items-center gap-2">
                                <i class="fa-solid fa-magnifying-glass"></i>
                                {{ __('Quick Student Search') }}
                            </h3>
                            <form method="GET" action="{{ route('students.index') }}" class="flex items-center gap-2">
                                <input type="text" name="search" placeholder="Search name, student no., or email..."
                                    class="flex-1 px-4 py-2.5 bg-slate-950/80 border border-slate-800 focus:border-rose-400 rounded-xl text-sm text-white placeholder-slate-500 focus:outline-none focus:ring-1 focus:ring-rose-400 font-mono transition">
                                <button type="submit" class="px-4 py-2.5 rounded-xl bg-gradient-to-r from-rose-500 to-amber-500 hover:from-rose-400 hover:to-amber-400 text-slate-950 font-tech font-bold text-xs uppercase transition shadow-lg shadow-rose-500/20">
                                    {{ __('Go') }}
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="cyber-glow bg-slate-900/80 border border-rose-500/20 rounded-2xl backdrop-blur-xl overflow-hidden">
                        <div class="p-6">
                            <h3 class="font-tech font-bold text-sm tracking-wider uppercase text-rose-300 mb-5">{{ __('Recent Enrollments') }}</h3>

                            @if ($recentEnrollments->isEmpty())
                                <p class="text-slate-500 font-mono text-sm">{{ __('No enrollments yet.') }}</p>
                            @else
                                <ul class="space-y-3 font-mono text-xs">
                                    @foreach ($recentEnrollments as $enrollment)
                                        <li class="p-3 rounded-xl bg-slate-950/70 border border-slate-800/80 flex items-center justify-between gap-3">
                                            <div class="min-w-0">
                                                <div class="text-white font-bold truncate">{{ $enrollment->student->fullName() }}</div>
                                                <div class="text-[10px] text-slate-500 truncate">{{ $enrollment->subject->subject_code }} &mdash; {{ $enrollment->subject->subject_name }}</div>
                                            </div>
                                            <span class="shrink-0 px-2 py-1 rounded bg-emerald-500/10 text-emerald-400 text-[10px] border border-emerald-500/20 capitalize">{{ $enrollment->status->value }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
