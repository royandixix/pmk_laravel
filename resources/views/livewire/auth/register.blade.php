<x-layouts::auth>
    <div class="flex flex-col items-center gap-6 text-center">

        {{-- Icon Utama --}}
        <div class="relative flex items-center justify-center w-24 h-24">
            <div class="absolute w-24 h-24 rounded-full bg-red-100 dark:bg-red-900/20 animate-ping opacity-20"></div>
            <div class="relative flex items-center justify-center w-20 h-20 rounded-full bg-gradient-to-br from-red-100 to-red-200 dark:from-red-900/40 dark:to-red-800/30 shadow-lg shadow-red-200/50 dark:shadow-red-900/30">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-red-500 dark:text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                </svg>
            </div>
        </div>

        {{-- Judul & Deskripsi --}}
        <div class="flex flex-col gap-2">
            <h1 class="text-2xl font-bold text-zinc-800 dark:text-zinc-100 tracking-tight">
                {{ __('Registrasi Ditutup') }}
            </h1>
            <p class="text-sm text-zinc-500 dark:text-zinc-400 max-w-xs leading-relaxed">
                {{ __('Maaf, pendaftaran akun baru saat ini tidak tersedia untuk umum.') }}
            </p>
        </div>

        {{-- Info Box --}}
        <div class="w-full rounded-xl bg-amber-50 dark:bg-amber-900/20 border border-amber-200 dark:border-amber-700/50 px-4 py-4">
            <div class="flex items-start gap-3 text-left">
                <div class="flex items-center justify-center w-8 h-8 rounded-full bg-amber-100 dark:bg-amber-800/40 shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-amber-600 dark:text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                    </svg>
                </div>
                <p class="text-xs text-amber-700 dark:text-amber-300 leading-relaxed">
                    {{ __('Akun hanya dapat dibuat oleh administrator. Hubungi admin untuk mendapatkan akses masuk.') }}
                </p>
            </div>
        </div>

        {{-- Divider --}}
        <div class="flex items-center gap-3 w-full">
            <div class="flex-1 border-t border-zinc-200 dark:border-zinc-700"></div>
            <span class="text-xs text-zinc-400 dark:text-zinc-500 whitespace-nowrap">{{ __('butuh akses?') }}</span>
            <div class="flex-1 border-t border-zinc-200 dark:border-zinc-700"></div>
        </div>

        {{-- Tombol WhatsApp — hardcode href, tanpa Blade expression --}}
        <a href="https://wa.me/6281356559869?text=Halo%20Admin%2C%20saya%20ingin%20meminta%20akses%20akun.%20Mohon%20bantuannya"
           target="_blank"
           class="w-full flex items-center justify-center gap-3 px-4 py-3 rounded-xl bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 active:scale-95 transition-all duration-200 shadow-md shadow-green-500/30 text-white font-semibold text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-white shrink-0" viewBox="0 0 24 24">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
            </svg>
            <span>{{ __('Chat Admin via WhatsApp') }}</span>
        </a>

        {{-- Tombol Login --}}
        <flux:button :href="route('login')" variant="ghost" class="w-full" wire:navigate>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
            </svg>
            {{ __('Sudah punya akun? Masuk') }}
        </flux:button>

    </div>
</x-layouts::auth>