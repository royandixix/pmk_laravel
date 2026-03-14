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

                <flux:button href="#hubungi" variant="outline" 
                    class="w-full sm:w-auto justify-center px-8 sm:px-10 py-3 sm:py-4 text-sm sm:text-lg text-white border-white/50 hover:bg-white/10 backdrop-blur-sm">
                    Hubungi Kami
                    <span class="ml-2">→</span>
                </flux:button>
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