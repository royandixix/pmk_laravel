<?php

use Livewire\Volt\Component;

new class extends Component {
    public array $headerImages = [
        '/img/kegiatan/maper/IMG-20241028-WA0060.jpg',
        '/img/kegiatan/maper/IMG-20241028-WA0276.jpg',
        '/img/kegiatan/maper/20241026_000236.jpg',
    ];

    public array $programs = [
        [
            'title' => 'Pengenalan Kampus',
            'desc' => 'Peserta Maper diperkenalkan dengan lingkungan kampus, fasilitas yang tersedia, dan sistem akademik di Universitas Dipa Makassar untuk memudahkan adaptasi mahasiswa baru.',
            'image' => '/img/kegiatan/maper/IMG-20241028-WA0290.jpg',
        ],
        [
            'title' => 'Keakraban',
            'desc' => 'Melalui berbagai kegiatan interaktif, peserta membangun keakraban dan kekeluargaan dengan sesama mahasiswa baru serta kakak tingkat dalam suasana yang hangat dan menyenangkan.',
            'image' => '/img/kegiatan/maper/20241026_092858.jpg',
        ],
        [
            'title' => 'Nilai Pelayanan',
            'desc' => 'Maper memperkenalkan nilai-nilai pelayanan Kristen dan semangat spiritual yang menjadi fondasi PMK, membantu mahasiswa baru memahami visi dan misi organisasi.',
            'image' => '/img/kegiatan/maper/20241026_003808.jpg',
        ],
    ];

    public function rendering($view)
    {
        $view->layout('components.user.layouts.user');
    }
}; ?>

<div x-data="{ 
        activeSlide: 0, 
        slides: {{ json_encode($headerImages) }},
        init() {
            setInterval(() => {
                this.activeSlide = (this.activeSlide + 1) % this.slides.length;
            }, 4000);

            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('active');
                    }
                });
            }, { threshold: 0.1 });
            
            document.querySelectorAll('.reveal-on-scroll').forEach(el => observer.observe(el));
        }
     }" 
     class="bg-white min-h-screen text-gray-900 overflow-x-hidden">

    {{-- HEADER SLIDER --}}
    <div class="relative h-[520px] overflow-hidden bg-gray-200">
        <template x-for="(img, index) in slides" :key="index">
            <div x-show="activeSlide === index"
                 x-transition:enter="transition ease-out duration-[1500ms]"
                 x-transition:enter-start="opacity-0 scale-[1.2]"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-[1500ms]"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-[1.2]"
                 class="absolute inset-0">
                <img :src="img" class="h-full w-full object-cover rounded-none">
            </div>
        </template>

        <div class="absolute inset-0 bg-black/40"></div>

        <div class="relative z-10 flex h-full items-center">
            <div class="mx-auto max-w-7xl px-6 text-white w-full">
                <h1 class="text-5xl font-bold sm:text-7xl">
                    Masa <span class="bg-clip-text text-transparent bg-gradient-to-br from-[#fbbf24] to-[#f97316]">Pengenalan</span>
                </h1>
                <p class="mt-6 max-w-2xl text-lg">
                    PMK Universitas Dipa Makassar
                </p>
            </div>
        </div>
    </div>

    {{-- ABOUT SECTION --}}
    <section class="w-full bg-white py-20 overflow-hidden">
        <div class="mx-auto max-w-6xl px-6 reveal-on-scroll opacity-0">
            <h2 class="text-3xl font-bold text-gray-900">
                Tentang <span class="text-gray-900">Maper</span>
            </h2>

            <div class="mt-6 text-lg leading-relaxed text-gray-700">
                <span class="block text-2xl font-bold leading-snug text-gray-900 sm:text-3xl">
                    Masa Pengenalan (Maper) adalah kegiatan tahunan yang
                    diselenggarakan oleh PMK Universitas Dipa Makassar untuk
                    menyambut mahasiswa baru
                </span>

                <span class="mt-5 block text-lg sm:text-xl">
                    Kegiatan ini bertujuan memperkenalkan <strong>lingkungan kampus</strong>,
                    <strong> nilai-nilai pelayanan</strong>, serta
                    membangun <strong>keakraban</strong> antar anggota PMK secara 
                    spiritual dan kekeluargaan.
                </span>
            </div>
        </div>
    </section>

    {{-- PROGRAMS SECTION --}}
    <section class="mx-auto max-w-6xl px-6 py-20 overflow-hidden">
        <div class="space-y-24">
            @foreach($programs as $index => $item)
                <div class="grid grid-cols-1 items-center gap-12 md:grid-cols-2 reveal-on-scroll opacity-0 translate-y-10">
                    {{-- Bagian Gambar - No Rounded --}}
                    <div class="{{ $index % 2 !== 0 ? 'md:order-2' : '' }}">
                        <img src="{{ asset($item['image']) }}" 
                             alt="{{ $item['title'] }}" 
                             class="h-[500px] w-full object-cover shadow-2xl rounded-none">
                    </div>
                    
                    {{-- Bagian Teks --}}
                    <div class="{{ $index % 2 !== 0 ? 'md:order-1' : '' }}">
                        <h4 class="text-3xl font-bold mb-4 text-gray-900 uppercase">
                            {{ $item['title'] }}
                        </h4>
                        <p class="text-xl leading-relaxed text-gray-700">
                            {{ $item['desc'] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <style>
        .reveal-on-scroll { 
            transition: all 0.8s ease-out; 
        }
        .reveal-on-scroll.active { 
            opacity: 1; 
            transform: translate(0, 0); 
        }
    </style>
</div>