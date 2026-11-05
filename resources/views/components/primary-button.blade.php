<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-aeon border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-aeon-dark focus:bg-aeon-dark active:bg-aeon-dark focus:outline-none focus:ring-2 focus:ring-aeon focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>