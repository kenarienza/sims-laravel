@props(['student', 'size' => 'md'])

@php
    $palettes = [
        'from-cyan-400 to-indigo-500 ring-cyan-500/30',
        'from-indigo-400 to-purple-500 ring-indigo-500/30',
        'from-purple-400 to-pink-500 ring-purple-500/30',
        'from-emerald-400 to-cyan-500 ring-emerald-500/30',
        'from-amber-400 to-rose-500 ring-amber-500/30',
    ];

    $sizes = [
        'sm' => 'h-8 w-8 text-[10px]',
        'md' => 'h-10 w-10 text-xs',
        'lg' => 'h-16 w-16 text-lg',
    ];

    $palette = $palettes[crc32($student->fullName()) % count($palettes)];
    $sizeClasses = $sizes[$size] ?? $sizes['md'];
@endphp

<div {{ $attributes->merge(['class' => "shrink-0 {$sizeClasses} rounded-full bg-gradient-to-br {$palette} ring-2 flex items-center justify-center font-tech font-bold text-slate-950"]) }}>
    {{ $student->initials() }}
</div>
