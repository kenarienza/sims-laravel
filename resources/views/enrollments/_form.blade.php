@php $enrollment ??= null; @endphp

@php
$selectClasses = 'block w-full bg-slate-950/80 border border-slate-800 focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 rounded-xl text-white font-mono text-sm transition';
@endphp

<div>
    <x-input-label for="student_id" :value="__('Student')" />
    <select id="student_id" name="student_id" class="{{ $selectClasses }}" required>
        <option value="">{{ __('Select a student') }}</option>
        @foreach ($students as $student)
            <option value="{{ $student->id }}" @selected(old('student_id', $enrollment?->student_id) == $student->id)>
                {{ $student->student_number }} - {{ $student->fullName() }}
            </option>
        @endforeach
    </select>
    <x-input-error :messages="$errors->get('student_id')" class="mt-2" />
</div>

<div>
    <x-input-label for="subject_id" :value="__('Subject')" />
    <select id="subject_id" name="subject_id" class="{{ $selectClasses }}" required>
        <option value="">{{ __('Select a subject') }}</option>
        @foreach ($subjects as $subject)
            <option value="{{ $subject->id }}" @selected(old('subject_id', $enrollment?->subject_id) == $subject->id)>
                {{ $subject->subject_code }} - {{ $subject->subject_name }}
            </option>
        @endforeach
    </select>
    <x-input-error :messages="$errors->get('subject_id')" class="mt-2" />
</div>

<div>
    <x-input-label for="school_year" :value="__('School Year')" />
    <x-text-input id="school_year" name="school_year" type="text" class="block w-full" placeholder="2025-2026"
        :value="old('school_year', $enrollment?->school_year)" required />
    <x-input-error :messages="$errors->get('school_year')" class="mt-2" />
</div>

<div>
    <x-input-label for="semester" :value="__('Semester')" />
    <select id="semester" name="semester" class="{{ $selectClasses }}" required>
        @foreach (['1st Semester', '2nd Semester', 'Summer'] as $option)
            <option value="{{ $option }}" @selected(old('semester', $enrollment?->semester) === $option)>{{ $option }}</option>
        @endforeach
    </select>
    <x-input-error :messages="$errors->get('semester')" class="mt-2" />
</div>

<div>
    <x-input-label for="status" :value="__('Status')" />
    <select id="status" name="status" class="{{ $selectClasses }}" required>
        @foreach (\App\Enums\EnrollmentStatus::cases() as $option)
            <option value="{{ $option->value }}" @selected(old('status', $enrollment?->status?->value) === $option->value)>{{ ucfirst($option->value) }}</option>
        @endforeach
    </select>
    <x-input-error :messages="$errors->get('status')" class="mt-2" />
</div>
