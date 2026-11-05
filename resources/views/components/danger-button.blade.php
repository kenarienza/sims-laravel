<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2.5 rounded-xl bg-gradient-to-r from-rose-500 to-amber-500 hover:from-rose-400 hover:to-amber-400 border border-transparent font-tech font-bold text-xs text-slate-950 uppercase tracking-wider shadow-lg shadow-rose-500/20 focus:outline-none focus:ring-1 focus:ring-rose-400 transition transform active:scale-95']) }}>
    {{ $slot }}
</button>
