<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-gradient-to-r from-cyan-400 via-teal-300 to-indigo-400 hover:from-cyan-300 hover:to-indigo-300 border border-transparent font-tech font-bold text-xs text-slate-950 uppercase tracking-wider shadow-lg shadow-cyan-500/20 focus:outline-none focus:ring-1 focus:ring-cyan-400 transition transform active:scale-95']) }}>
    {{ $slot }}
</button>
