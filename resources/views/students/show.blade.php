<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <x-student-avatar :student="$student" size="lg" />
            <h2 class="font-tech font-bold text-xl text-white leading-tight">
                {{ $student->fullName() }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="cyber-glow bg-slate-900/80 border border-cyan-500/20 rounded-2xl backdrop-blur-xl p-6">
                <dl class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <dt class="text-xs font-mono uppercase text-cyan-400">{{ __('Student Number') }}</dt>
                        <dd class="font-medium text-white mt-1">{{ $student->student_number }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-mono uppercase text-cyan-400">{{ __('Email') }}</dt>
                        <dd class="font-medium text-white mt-1">{{ $student->email }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-mono uppercase text-cyan-400">{{ __('Course') }}</dt>
                        <dd class="font-medium text-white mt-1">{{ $student->course }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-mono uppercase text-cyan-400">{{ __('Year Level') }}</dt>
                        <dd class="font-medium text-white mt-1">{{ $student->year_level }}</dd>
                    </div>
                </dl>
            </div>

            <div class="cyber-glow bg-slate-900/80 border border-purple-500/20 rounded-2xl backdrop-blur-xl p-6">
                <h3 class="font-tech font-bold text-sm tracking-wider uppercase text-purple-300 mb-4">{{ __('Enrollments') }}</h3>

                @if ($student->enrollments->isEmpty())
                    <p class="text-slate-500 font-mono text-sm">{{ __('Not enrolled in any subject yet.') }}</p>
                @else
                    <table class="min-w-full divide-y divide-slate-800">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-left text-xs font-mono font-medium text-purple-400 uppercase tracking-wider">{{ __('Subject') }}</th>
                                <th class="px-4 py-2 text-left text-xs font-mono font-medium text-purple-400 uppercase tracking-wider">{{ __('School Year') }}</th>
                                <th class="px-4 py-2 text-left text-xs font-mono font-medium text-purple-400 uppercase tracking-wider">{{ __('Semester') }}</th>
                                <th class="px-4 py-2 text-left text-xs font-mono font-medium text-purple-400 uppercase tracking-wider">{{ __('Status') }}</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-800/80">
                            @foreach ($student->enrollments as $enrollment)
                                <tr class="hover:bg-purple-500/5 transition">
                                    <td class="px-4 py-3 text-sm text-slate-200">{{ $enrollment->subject->subject_code }} &mdash; {{ $enrollment->subject->subject_name }}</td>
                                    <td class="px-4 py-3 font-mono text-sm text-slate-400">{{ $enrollment->school_year }}</td>
                                    <td class="px-4 py-3 font-mono text-sm text-slate-400">{{ $enrollment->semester }}</td>
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

            <a href="{{ route('students.index') }}" class="inline-flex items-center gap-1.5 text-xs font-mono uppercase tracking-wider text-cyan-400 hover:text-cyan-300 transition">
                <i class="fa-solid fa-arrow-left"></i>
                {{ __('Back to Students') }}
            </a>
        </div>
    </div>
</x-app-layout>
