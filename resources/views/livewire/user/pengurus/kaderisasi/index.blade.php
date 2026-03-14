<?php

use Livewire\Volt\Component;

new class extends Component {
    public array $partners = [];

    public function mount()
    {
        $this->partners = [
            [
                'id' => 1,
                'name' => 'RICADT YOHANIS PARABAK (KORD)',
                'description' => 'Koordinator Bidang Kaderisasi yang bertanggung jawab atas pembinaan dan pengembangan anggota.',
                'image' => '/img/pengurus/kaderisasi/RICADT YOHANIS PARABAK(KORD).jpg',
                'category' => 'Koordinator',
            ],
            [
                'id' => 2,
                'name' => 'DODY ARYANTA MARRUNG KAYANG',
                'description' => 'Staff bidang yang berkontribusi dalam pelaksanaan program kaderisasi organisasi.',
                'image' => '/img/pengurus/kaderisasi/DODY ARYANTA MARRUNG KAYANG.jpg',
                'category' => 'Staff',
            ],
            [
                'id' => 3,
                'name' => 'ETWARD PALANGDA',
                'description' => 'Staff bidang yang membantu proses monitoring dan evaluasi perkembangan anggota baru.',
                'image' => '/img/pengurus/kaderisasi/ETWARD PALANGDA.jpg',
                'category' => 'Staff',
            ],
            [
                'id' => 4,
                'name' => 'IRMAYANTI RURU TOBAN',
                'description' => 'Staff bidang yang mengelola administrasi dan koordinasi kegiatan pembinaan.',
                'image' => '/img/pengurus/kaderisasi/IRMAYANTI RURU TOBAN.jpg',
                'category' => 'Staff',
            ],
        ];
    }

    public function rendering($view)
    {
        $view->layout('components.user.layouts.user');
    }
}; ?>

<div x-data="{ selected: null }" class="relative min-h-screen bg-[#09090b]">
    {{-- Banner Section --}}
    <div class="relative h-[40vh] md:h-[50vh] w-full bg-cover bg-center bg-fixed" 
         style="background-image: url('{{ asset('/img/pengurus/kaderisasi/kaderisasi-min.JPG') }}')">
        <div class="absolute inset-0 bg-gradient-to-t from-[#09090b] via-black/40 to-black/20"></div>
        
        <div class="relative z-10 max-w-7xl mx-auto px-6 h-full flex items-center">
            <div class="max-w-3xl text-white animate-fade-in">
                <h1 class="text-3xl md:text-5xl font-bold mb-4 tracking-tight uppercase leading-tight">
                    Bidang <br class="hidden md:block"/> Kaderisasi
                </h1>
                <p class="text-sm md:text-lg text-gray-300 leading-relaxed max-w-xl font-light">
                    Bertanggung jawab dalam menjalankan program pembinaan dan pengembangan anggota agar siap berperan aktif dalam organisasi.
                </p>
            </div>
        </div>
    </div>

    {{-- Content Grid --}}
    <div class="relative z-10 max-w-7xl mx-auto px-6 -mt-10 md:-mt-16 pb-24">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
            @foreach($partners as $partner)
                <div @click="selected = {{ json_encode($partner) }}" 
                     class="group cursor-pointer rounded-2xl overflow-hidden bg-zinc-900/40 backdrop-blur-xl border border-white/10 transition-all duration-500 hover:md:-translate-y-2 reveal-on-scroll">
                    
                    <div class="relative h-72 md:h-80 w-full overflow-hidden">
                        <img src="{{ asset($partner['image']) }}" 
                             alt="{{ $partner['name'] }}" 
                             class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-zinc-900 via-transparent to-transparent opacity-60"></div>
                        <span class="absolute top-4 left-4 px-3 py-1 bg-white/10 backdrop-blur-md border border-white/20 rounded-full text-[9px] uppercase tracking-wider font-bold text-white">
                            {{ $partner['category'] }}
                        </span>
                    </div>

                    <div class="p-5 md:p-6 text-center">
                        <h3 class="font-bold text-base md:text-lg text-white uppercase tracking-wide leading-snug">
                            {{ $partner['name'] }}
                        </h3>
                        <p class="text-blue-500 text-[10px] md:text-xs font-bold uppercase tracking-[0.2em] mt-2">
                            {{ $partner['category'] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Modal Detail - Mobile Optimized --}}
    <template x-teleport="body">
        <div x-show="selected" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             class="fixed inset-0 z-[100] flex items-center justify-center bg-black/95 backdrop-blur-md p-4 md:p-5"
             @keydown.escape.window="selected = null"
             style="display: none;">
            
            <div @click.away="selected = null" 
                 x-show="selected"
                 x-transition:enter="transition ease-out duration-300 transform"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 class="relative max-w-2xl w-full bg-zinc-950 rounded-2xl md:rounded-3xl overflow-hidden border border-white/10 shadow-2xl flex flex-col md:flex-row max-h-[90vh] md:max-h-none overflow-y-auto">
                
                {{-- Tombol Close Tebal & Jelas --}}
                <button @click="selected = null" 
                        class="absolute top-4 right-4 z-[110] bg-black/60 hover:bg-white/20 text-white rounded-full p-2.5 backdrop-blur-md border border-white/20 transition-all shadow-lg active:scale-90">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <div class="w-full md:w-[45%] aspect-[3/4] md:aspect-auto bg-zinc-900">
                    <img :src="selected?.image" 
                         class="w-full h-full object-cover object-top"
                         :alt="selected?.name">
                </div>

                <div class="w-full md:w-[55%] p-6 md:p-10 flex flex-col justify-center bg-zinc-950">
                    <span class="text-blue-500 font-bold tracking-[0.2em] text-[10px] uppercase mb-2 block" x-text="selected?.category"></span>
                    <h3 class="text-xl md:text-2xl font-bold text-white mb-4 uppercase tracking-tight leading-tight" x-text="selected?.name"></h3>
                    <div class="w-8 h-0.5 bg-blue-600 mb-5 opacity-60"></div>
                    <p class="text-zinc-400 text-sm md:text-base leading-relaxed italic font-light" x-text="'&quot;' + selected?.description + '&quot;'"></p>
                    
                    <div class="mt-8 pt-5 border-t border-white/5 flex items-center justify-between">
                        <span class="text-[8px] text-zinc-600 uppercase tracking-[0.2em]">Bidang Kaderisasi</span>
                        <div class="flex gap-1.5">
                            <div class="w-1.5 h-1.5 rounded-full bg-blue-600/20"></div>
                            <div class="w-1.5 h-1.5 rounded-full bg-blue-600/50"></div>
                            <div class="w-1.5 h-1.5 rounded-full bg-blue-600"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>

    <style>
        @keyframes fade-in { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        .animate-fade-in { animation: fade-in 1s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
        .reveal-on-scroll { opacity: 0; transform: translateY(30px); transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1); }
        .reveal-on-scroll.active { opacity: 1; transform: translateY(0); }
    </style>

    <script>
        document.addEventListener('livewire:navigated', () => {
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) entry.target.classList.add('active');
                });
            }, { threshold: 0.1 });
            document.querySelectorAll('.reveal-on-scroll').forEach(el => observer.observe(el));
        });
    </script>
</div>