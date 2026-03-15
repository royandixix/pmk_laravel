<div class="relative bg-cover bg-center overflow-hidden flex flex-col"
     style="background-image: url('{{ asset('img/pengurus/pengurus terpilih-min.JPG') }}')">

    <div class="absolute inset-0 bg-black/40 shadow-inner"></div>

    <flux:container class="relative z-10 w-full px-6 pt-20 sm:pt-32 pb-10 sm:pb-20 sm:min-h-screen sm:flex sm:items-center">
        <div class="max-w-4xl space-y-4 sm:space-y-10">

            <div class="space-y-2 sm:space-y-3">
                <div class="flex items-center gap-2 opacity-90">
                    <div class="h-[1.5px] w-8 bg-yellow-500"></div>
                    <span class="text-white text-xs font-bold tracking-[.3em] uppercase">PMK UNDIPA</span>
                </div>

                <h1 class="font-extrabold text-white text-2xl sm:text-6xl md:text-8xl leading-[1.1] tracking-tight">
                    <span class="text-gradient bg-gradient-to-r from-yellow-400 via-orange-400 to-red-500">
                        Persekutuan <br class="sm:hidden"> Mahasiswa Kristen
                    </span>
                    <br>
                    <span class="text-white text-base sm:text-3xl md:text-5xl block mt-1 font-semibold opacity-95">
                        Universitas Dipa Makassar
                    </span>
                </h1>
            </div>

            <p class="text-white/90 text-sm sm:text-2xl max-w-2xl leading-relaxed font-medium">
                Bersatu dalam Iman, Bertumbuh dalam Kasih, <br class="hidden sm:block">
                dan Melayani dengan Setia.
            </p>

            <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 sm:pt-4">
                <flux:button href="#bergabung" variant="primary"
                    class="w-full sm:w-auto justify-center px-8 sm:px-10 py-3 sm:py-4 text-sm sm:text-lg font-bold shadow-xl">
                    Bergabung Sekarang
                </flux:button>

                {{-- Tombol Hubungi Kami → WA hardcode --}}
                <a href="https://wa.me/6281356559869?text=Halo%20PMK%20UNDIPA%2C%20saya%20ingin%20menghubungi%20kalian."
                   target="_blank"
                   class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 sm:px-10 py-3 sm:py-4 text-sm sm:text-lg font-semibold text-white border border-white/50 hover:bg-white/10 backdrop-blur-sm rounded-lg transition-all duration-200 active:scale-95">
                    {{-- WhatsApp Icon --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-white shrink-0" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                    Hubungi Kami
                    <span class="opacity-70">→</span>
                </a>
            </div>
        </div>
    </flux:container>

    <div class="absolute inset-0 pointer-events-none opacity-20">
        <div class="absolute top-1/4 left-1/4 w-2 h-2 bg-yellow-400 rounded-full animate-ping"></div>
        <div class="absolute bottom-1/4 right-1/4 w-2 h-2 bg-red-500 rounded-full animate-ping" style="animation-delay:1.5s;"></div>
    </div>
</div>

<style>
    @keyframes gradient {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    .text-gradient {
        background-size: 200% 200%;
        animation: gradient 4s ease infinite;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        display: inline-block;
    }
</style>