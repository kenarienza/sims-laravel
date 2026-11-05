<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2.5 rounded-xl bg-slate-900 border border-slate-800 hover:border-cyan-500/40 font-mono font-semibold text-xs text-slate-300 hover:text-cyan-300 uppercase tracking-wider focus:outline-none focus:ring-1 focus:ring-cyan-400 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
