<?php

use Livewire\Volt\Component;

new class extends Component {
    public array $leaders = [];
    public int $activeIndex = 0;

    public function mount()
    {
        $this->leaders = [
            ['id' => '1', 'name' => 'SINTA SATTU', 'role' => 'Sekretaris', 'imageUrl' => '/img/pengurus/sekertaris/SINTA SATTU-min.jpg'],
            ['id' => '2', 'name' => 'ANDRIB ARIB', 'role' => 'Ketua Umum', 'imageUrl' => '/img/pengurus/ketua/ANDRIB ARIB-min.jpg'],
            ['id' => '3', 'name' => 'JESLY PUTRI TIRANDA', 'role' => 'Bendahara', 'imageUrl' => '/img/pengurus/bendahara/JESLY PUTRI TIRANDA.JPG'],
            ['id' => '4', 'name' => 'NATALIA ARRUAN', 'role' => 'Wakil Ketua', 'imageUrl' => '/img/pengurus/wakil/NATALIA ARRUAN.jpg'],
        ];

        // Set default activeIndex ke Ketua Umum
        foreach ($this->leaders as $index => $leader) {
            if (strtolower($leader['role']) === 'ketua umum') {
                $this->activeIndex = $index;
                break;
            }
        }
    }
};
?>

<div class="bg-[#0f1116] min-h-screen flex flex-col items-center py-24 sm:py-32" 
     x-data="{ activeIndex: @entangle('activeIndex') }">

    <!-- Header -->
    <div class="text-center sm:text-left max-w-3xl mx-auto mb-20 px-6 sm:px-0 animate-fade-in">
        <h2 class="text-3xl sm:text-5xl tracking-tight text-white leading-tight">
            Bagan Struktur Organisasi PMK Universitas Dipa Makassar
        </h2>
        <p class="mt-6 text-lg sm:text-xl text-gray-300 font-semibold">Pengurus Harian</p>
        <p class="mt-3 text-base sm:text-lg text-gray-400 leading-relaxed">
            Pengurus Harian adalah anggota biasa yang dipilih dalam Rapat Umum Anggota.
        </p>
    </div>

    <!-- Carousel Mobile -->
    <div class="sm:hidden w-full">
        <div x-ref="carousel"
             class="flex gap-6 overflow-x-auto snap-x snap-mandatory scroll-smooth no-scrollbar px-6 pb-6"
             x-init="$nextTick(() => { 
                $refs.carousel.scrollLeft = $refs.carousel.children[activeIndex].offsetWidth * activeIndex;
             })"
             @scroll.debounce="activeIndex = Math.round($refs.carousel.scrollLeft / ($refs.carousel.firstElementChild.offsetWidth + 24))"
        >
            @foreach($leaders as $i => $leader)
                <div class="snap-center shrink-0 w-[85vw] max-w-sm">
                    <div class="relative rounded-2xl overflow-hidden bg-gray-900 shadow-md">
                        <img src="{{ asset($leader['imageUrl']) }}" alt="{{ $leader['name'] }}" class="h-[420px] w-full object-cover">
                        <div class="absolute bottom-0 left-0 right-0 p-5 text-center bg-gradient-to-t from-black/95 via-black/70 to-transparent backdrop-blur-md">
                            <div class="text-[11px] uppercase tracking-[2px] text-gray-300 font-medium">{{ $leader['role'] }}</div>
                            <h3 class="text-lg text-white font-semibold mt-1 tracking-wide">{{ $leader['name'] }}</h3>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="flex justify-center gap-2 mt-4">
            @foreach($leaders as $i => $leader)
                <button
                    @click="activeIndex = {{ $i }}; $refs.carousel.scrollTo({ left: $refs.carousel.children[{{ $i }}].offsetWidth * {{ $i }}, behavior:'smooth'})"
                    :class="activeIndex === {{ $i }} ? 'w-8 bg-white' : 'w-2 bg-gray-600'"
                    class="h-2 rounded-full transition-all duration-500"
                ></button>
            @endforeach
        </div>
    </div>

    <!-- Grid Desktop -->
    <div class="hidden sm:grid grid-cols-2 lg:grid-cols-4 gap-10 w-full max-w-7xl px-10">
        @foreach($leaders as $leader)
            <div class="relative rounded-2xl overflow-hidden bg-gray-900 shadow-md">
                <img src="{{ asset($leader['imageUrl']) }}" alt="{{ $leader['name'] }}" class="h-[420px] w-full object-cover">
                <div class="absolute bottom-0 left-0 right-0 p-5 text-center bg-gradient-to-t from-black/95 via-black/70 to-transparent backdrop-blur-md">
                    <div class="text-[11px] uppercase tracking-[2px] text-gray-300 font-medium">{{ $leader['role'] }}</div>
                    <h3 class="text-lg text-white font-semibold mt-1 tracking-wide">{{ $leader['name'] }}</h3>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Styles -->
    <style>
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        @keyframes fade-in {
            from { opacity: 0; transform: translateY(25px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in { animation: fade-in 0.8s ease-out forwards; }
    </style>
</div>