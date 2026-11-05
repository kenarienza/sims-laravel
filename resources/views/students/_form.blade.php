@php $student ??= null; @endphp

<div>
    <x-input-label for="student_number" :value="__('Student Number')" />
    <x-text-input id="student_number" name="student_number" type="text" class="block w-full"
        :value="old('student_number', $student?->student_number)" required autofocus />
    <x-input-error :messages="$errors->get('student_number')" class="mt-2" />
</div>

<div>
    <x-input-label for="first_name" :value="__('First Name')" />
    <x-text-input id="first_name" name="first_name" type="text" class="block w-full"
        :value="old('first_name', $student?->first_name)" required />
    <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
</div>

<div>
    <x-input-label for="last_name" :value="__('Last Name')" />
    <x-text-input id="last_name" name="last_name" type="text" class="block w-full"
        :value="old('last_name', $student?->last_name)" required />
    <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
</div>

<div>
    <x-input-label for="email" :value="__('Email')" />
    <x-text-input id="email" name="email" type="email" class="block w-full"
        :value="old('email', $student?->email)" required />
    <x-input-error :messages="$errors->get('email')" class="mt-2" />
</div>

<div>
    <x-input-label for="course" :value="__('Course')" />
    <x-text-input id="course" name="course" type="text" class="block w-full"
        :value="old('course', $student?->course)" required />
    <x-input-error :messages="$errors->get('course')" class="mt-2" />
</div>

<div>
    <x-input-label for="year_level" :value="__('Year Level')" />
    <select id="year_level" name="year_level" class="block w-full bg-slate-950/80 border border-slate-800 focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 rounded-xl text-white font-mono text-sm transition" required>
        @for ($year = 1; $year <= 6; $year++)
            <option value="{{ $year }}" @selected(old('year_level', $student?->year_level) == $year)>{{ $year }}</option>
        @endfor
    </select>
    <x-input-error :messages="$errors->get('year_level')" class="mt-2" />
</div>
