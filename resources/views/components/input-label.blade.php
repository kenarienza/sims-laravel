@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-xs font-mono uppercase tracking-wider text-cyan-400 mb-1.5']) }}>
    {{ $value ?? $slot }}
</label>
