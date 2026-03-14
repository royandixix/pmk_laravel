<?php

use Livewire\Volt\Component;

new class extends Component {
    public array $kegiatanData = [];

    public function mount()
    {
        $this->kegiatanData = [
            [
                'id' => 1,
                'slug' => 'ldk',
                'image' => '/img/kegiatan/ldk/2025_0411_20101900.jpg',
                'category' => 'Pengkaderan',
                'title' => 'LDK (Latihan Dasar Kepemimpinan)',
                'description' => 'LDK merupakan kegiatan pembinaan dasar bagi mahasiswa Kristen untuk membentuk karakter, kepemimpinan, dan kerohanian.',
            ],
            [
                'id' => 2,
                'slug' => 'maper',
                'image' => '/img/kegiatan/maper/IMG-20241028-WA0290.jpg',
                'category' => 'Orientasi',
                'title' => 'MAPER (Masa Penerimaan Anggota)',
                'description' => 'MAPER adalah kegiatan penerimaan anggota baru PMK sebagai wadah pengenalan organisasi.',
            ],
            [
                'id' => 3,
                'slug' => 'paska',
                'image' => '/img/kegiatan/paska/IMG-20250426-WA0053.jpg',
                'category' => 'Perayaan',
                'title' => 'PASKA (Perayaan Kebangkitan Kristus)',
                'description' => 'PASKA merupakan perayaan kebangkitan Tuhan Yesus Kristus sebagai pusat iman Kristen.',
            ],
        ];
    }
}; ?>

<div class="bg-[#09090b] py-24 relative overflow-hidden font-sans"
     x-data="{}"
     x-init="
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) entry.target.classList.add('active');
            });
        }, { threshold: 0.1 });
        $nextTick(() => {
            document.querySelectorAll('.reveal-on-scroll').forEach(el => observer.observe(el));
        });
     ">
    
    <div class="max-w-7xl mx-auto px-6">
        <div class="mb-20 reveal-on-scroll">
            <span class="inline-block mb-4 rounded-none bg-indigo-600/10 border border-indigo-500/20 px-4 py-1 text-xs font-semibold tracking-widest text-indigo-400 uppercase">
                SEKRETARIAT PMK - EVENTS
            </span>
            <h1 class="text-4xl lg:text-6xl font-bold text-white mb-6 tracking-tight">
                Serangkaian <br class="hidden lg:block" /> <span class="text-slate-500">Kegiatan Kami</span>
            </h1>
            <p class="max-w-2xl text-slate-400 text-lg lg:text-xl font-light leading-relaxed">
                PMK menyelenggarakan kegiatan utama yang berfokus pada pembinaan iman, kepemimpinan, serta perayaan iman Kristen dengan suasana kekeluargaan.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach($kegiatanData as $kegiatan)
                <a href="{{ url('/kegiatan/' . $kegiatan['slug']) }}" 
                   wire:navigate
                   class="group relative block reveal-on-scroll">
                    
                    <div class="relative h-[550px] w-full rounded-none overflow-hidden bg-zinc-900 border border-white/5 shadow-2xl transition-all duration-500 group-hover:border-indigo-500/30">
                        <img src="{{ asset($kegiatan['image']) }}" 
                             alt="{{ $kegiatan['title'] }}" 
                             loading="lazy"
                             class="w-full h-full object-cover transition-transform duration-[1.5s] ease-out group-hover:scale-110" />
                        
                        <div class="absolute inset-0 bg-gradient-to-t from-[#09090b] via-[#09090b]/40 to-transparent opacity-80 group-hover:opacity-95 transition-opacity duration-500"></div>
                        
                        <div class="absolute top-6 left-6">
                            <span class="px-4 py-1.5 bg-indigo-600 text-white rounded-none text-[10px] font-bold uppercase tracking-widest shadow-lg">
                                {{ $kegiatan['category'] }}
                            </span>
                        </div>

                        <div class="absolute bottom-0 left-0 p-8 w-full z-10">
                            <h3 class="text-2xl lg:text-3xl font-bold text-white mb-4 group-hover:text-indigo-400 transition-colors duration-300 leading-tight">
                                {{ $kegiatan['title'] }}
                            </h3>
                            
                            <div class="max-h-0 overflow-hidden group-hover:max-h-40 transition-all duration-700 ease-in-out">
                                <p class="text-slate-400 text-base leading-relaxed mb-6 font-light">
                                    {{ $kegiatan['description'] }}
                                </p>
                            </div>
                            
                            <div class="flex items-center text-indigo-500 text-[11px] font-bold uppercase tracking-[0.2em] mt-2 group-hover:text-white transition-colors">
                                <span>Explore Detail</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-3 transform group-hover:translate-x-3 transition-transform duration-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <style>
        .reveal-on-scroll { 
            opacity: 0; 
            transform: translateY(40px); 
            transition: all 1.2s cubic-bezier(0.16, 1, 0.3, 1); 
        }
        .reveal-on-scroll.active { 
            opacity: 1; 
            transform: translateY(0); 
        }
    </style>
</div>