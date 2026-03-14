<footer class="w-full border-t border-zinc-200 dark:border-zinc-800 bg-zinc-50 dark:bg-zinc-900/50 mt-auto">
    <div class="max-w-7xl mx-auto px-8 py-8">
        <div class="flex flex-col md:flex-row justify-between items-center gap-6">
            <div>
                <h3 class="text-sm font-bold text-zinc-800 dark:text-zinc-100">
                    PMK Management System
                </h3>
                <p class="text-xs text-zinc-500 mt-1">
                    Sistem pengelolaan anggota berbasis Laravel & Livewire.
                </p>
            </div>

            <nav class="flex items-center gap-8 text-sm font-medium text-zinc-500">
                <a href="{{ route('dashboard') }}" class="hover:text-teal-500 transition-colors">Dashboard</a>
                <a href="{{ route('anggota.index') }}" class="hover:text-teal-500 transition-colors">Anggota</a>
                <span class="text-zinc-400">© {{ date('Y') }} PMK System</span>
            </nav>
        </div>
    </div>
</footer>