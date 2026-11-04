<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Enrollments') }}
            </h2>

            @if (auth()->user()->isAdmin())
                <x-primary-button onclick="window.location='{{ route('enrollments.create') }}'">
                    {{ __('Enroll Student') }}
                </x-primary-button>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
            @if (session('status'))
                <div class="bg-green-100 text-green-800 px-4 py-3 rounded-md">
                    {{ session('status') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-900">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Student') }}</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Subject') }}</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('School Year') }}</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Semester') }}</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Status') }}</th>
                            <th class="px-6 py-3"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse ($enrollments as $enrollment)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $enrollment->student->fullName() }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $enrollment->subject->subject_code }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $enrollment->school_year }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $enrollment->semester }}</td>
                                <td class="px-6 py-4 whitespace-nowrap capitalize">{{ $enrollment->status->value }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right space-x-2">
                                    @if (auth()->user()->isAdmin())
                                        <a href="{{ route('enrollments.edit', $enrollment) }}" class="text-sm text-indigo-600 hover:underline">{{ __('Edit') }}</a>
                                        <form action="{{ route('enrollments.destroy', $enrollment) }}" method="POST" class="inline" onsubmit="return confirm('{{ __('Remove this enrollment?') }}')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-sm text-red-600 hover:underline">{{ __('Remove') }}</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-center text-gray-500">{{ __('No enrollments found.') }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{ $enrollments->links() }}
        </div>
    </div>
</x-app-layout>
