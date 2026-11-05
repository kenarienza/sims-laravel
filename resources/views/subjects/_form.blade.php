@php $subject ??= null; @endphp

<div>
    <x-input-label for="subject_code" :value="__('Subject Code')" />
    <x-text-input id="subject_code" name="subject_code" type="text" class="block w-full"
        :value="old('subject_code', $subject?->subject_code)" required autofocus />
    <x-input-error :messages="$errors->get('subject_code')" class="mt-2" />
</div>

<div>
    <x-input-label for="subject_name" :value="__('Subject Name')" />
    <x-text-input id="subject_name" name="subject_name" type="text" class="block w-full"
        :value="old('subject_name', $subject?->subject_name)" required />
    <x-input-error :messages="$errors->get('subject_name')" class="mt-2" />
</div>

<div>
    <x-input-label for="units" :value="__('Units')" />
    <x-text-input id="units" name="units" type="number" min="1" max="6" class="block w-full"
        :value="old('units', $subject?->units)" required />
    <x-input-error :messages="$errors->get('units')" class="mt-2" />
</div>
