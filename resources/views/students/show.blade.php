<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $student->fullName() }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <dl class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <dt class="text-sm text-gray-500">{{ __('Student Number') }}</dt>
                        <dd class="font-medium">{{ $student->student_number }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm text-gray-500">{{ __('Email') }}</dt>
                        <dd class="font-medium">{{ $student->email }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm text-gray-500">{{ __('Course') }}</dt>
                        <dd class="font-medium">{{ $student->course }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm text-gray-500">{{ __('Year Level') }}</dt>
                        <dd class="font-medium">{{ $student->year_level }}</dd>
                    </div>
                </dl>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="font-semibold text-lg mb-4">{{ __('Enrollments') }}</h3>

                @if ($student->enrollments->isEmpty())
                    <p class="text-gray-500">{{ __('Not enrolled in any subject yet.') }}</p>
                @else
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Subject') }}</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">{{ __('School Year') }}</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Semester') }}</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Status') }}</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($student->enrollments as $enrollment)
                                <tr>
                                    <td class="px-4 py-2">{{ $enrollment->subject->subject_code }} - {{ $enrollment->subject->subject_name }}</td>
                                    <td class="px-4 py-2">{{ $enrollment->school_year }}</td>
                                    <td class="px-4 py-2">{{ $enrollment->semester }}</td>
                                    <td class="px-4 py-2 capitalize">{{ $enrollment->status->value }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

            <a href="{{ route('students.index') }}" class="text-sm text-indigo-600 hover:underline">{{ __('Back to Students') }}</a>
        </div>
    </div>
</x-app-layout>
