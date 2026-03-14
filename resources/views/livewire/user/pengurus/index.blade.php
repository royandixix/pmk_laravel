<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Computed;

new class extends Component {

    #[Computed(persist: false)]
    public function bidangData(): array
    {
        return [
            [
                'title' => 'Bidang Kerohanian dan Pelayanan',
                'description' => 'Bertanggung jawab penuh atas seluruh program ibadah dan pengembangan spiritual anggota. Bidang ini memastikan pertumbuhan iman pengurus tetap terjaga melalui persekutuan rutin dan koordinasi hari besar keagamaan secara berkelanjutan.',
                'imageUrl' => '/img/pengurus/kerohanian/kerohanian-min.JPG',
                'route' => 'user.pengurus.kerohanian',
                'reverse' => false,
            ],
            [
                'title' => 'Bidang Kaderisasi',
                'description' => 'Fokus pada program pembinaan, regenerasi, dan pengembangan karakter anggota PMK. Melalui pelatihan kepemimpinan dan workshop, bidang ini berupaya mencetak kader-kader yang memiliki integritas tinggi untuk masa depan organisasi.',
                'imageUrl' => '/img/pengurus/kaderisasi/kaderisasi-min.JPG',
                'route' => 'user.pengurus.kaderisasi',
                'reverse' => true,
            ],
            [
                'title' => 'Bidang Humas',
                'description' => 'Menjadi jembatan komunikasi antara PMK Universitas Dipa Makassar dengan organisasi intra maupun ekstra kampus. Bertugas mengelola citra publik organisasi dan menyebarkan informasi penting melalui berbagai kanal media komunikasi.',
                'imageUrl' => '/img/pengurus/humas/humas-min.JPG',
                'route' => 'user.pengurus.humas',
                'reverse' => false,
            ],
            [
                'title' => 'Bidang Study Club',
                'description' => 'Mendukung kualitas intelektual melalui kegiatan pembelajaran inovatif dan sesi sharing teknologi. Fokus utamanya adalah mewadahi anggota dalam mengasah kompetensi akademik serta keahlian teknis yang relevan dengan perkembangan zaman.',
                'imageUrl' => '/img/pengurus/study_clup/Study Club-min.jpg',
                'route' => 'user.pengurus.studyclub',
                'reverse' => true,
            ],
            [
                'title' => 'Bidang Minat Dan Bakat',
                'description' => 'Wadah bagi anggota untuk mengeksplorasi potensi diri di luar akademik, seperti seni dan olahraga. Bertujuan mempererat kekeluargaan sekaligus memberikan ruang berekspresi bagi setiap bakat kreatif yang dimiliki oleh anggota.',
                'imageUrl' => '/img/pengurus/mb/mb-min.JPG',
                'route' => 'user.pengurus.minatbakat',
                'reverse' => false,
            ],
            [
                'title' => 'Bidang Kesekretariatan dan Dana',
                'description' => 'Mengelola administrasi, inventaris, dan keuangan organisasi secara profesional. Bidang ini juga aktif menjalankan usaha kreatif penggalangan dana demi mendukung kelancaran finansial setiap program kerja pengurus.',
                'imageUrl' => '/img/pengurus/kesda/kesda-min.JPG',
                'route' => 'user.pengurus.kesda',
                'reverse' => true,
            ],
        ];
    }
}; 
?>

<div class="bg-white pb-20 overflow-x-hidden">
    <div class="py-16 px-4 sm:px-6 lg:px-10 animate-fade-in-up">
        <div class="max-w-6xl mx-auto">
            <div class="flex items-center justify-between md:grid md:grid-cols-[150px_1fr] gap-8">
                <div class="flex md:justify-start justify-end transform transition-transform hover:scale-105 duration-500">
                    <img src="{{ asset('/img/logo/Logo PMK NEW-1.png') }}" 
                         alt="Logo PMK" 
                         width="128" height="128"
                         class="w-16 sm:w-20 md:w-28 lg:w-32 object-contain">
                </div>

                <div class="transform transition-all duration-500 hover:translate-x-1">
                    <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-500 bg-clip-text text-transparent drop-shadow-xl inline-block">
                        PENGURUS BIDANG
                    </h1>
                    <p class="mt-4 text-gray-700 text-base sm:text-lg md:text-xl max-w-2xl leading-relaxed">
                        Pengurus Bidang adalah anggota yang dipilih oleh tim formatur untuk menjalankan tugas sesuai bidang masing-masing demi kemuliaan Tuhan.
                    </p>
                    <div class="mt-6 h-1 w-32 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full shadow-sm"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-6 space-y-24">
        @foreach($this->bidangData as $bidang)
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center reveal-on-scroll">
                
                <div class="{{ $bidang['reverse'] ? 'lg:order-2' : '' }} transform transition-all duration-500 hover:scale-[1.03]">
                    <a href="{{ route($bidang['route']) }}" wire:navigate class="group block relative">
                        <img src="{{ asset($bidang['imageUrl']) }}" 
                             alt="{{ $bidang['title'] }}" 
                             loading="lazy"
                             decoding="async"
                             class="w-full rounded-2xl shadow-xl ring-1 ring-gray-200 cursor-pointer object-cover aspect-video">
                        
                        <span class="absolute bottom-4 right-4 bg-black/80 backdrop-blur-sm text-white text-xs sm:text-sm px-4 py-2 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 shadow-lg">
                            Lihat Struktur Bidang →
                        </span>
                    </a>
                </div>

                <div class="{{ $bidang['reverse'] ? 'lg:order-1' : '' }} transform transition-transform duration-500 hover:-translate-y-1">
                    <h2 class="text-3xl font-bold text-gray-900 leading-tight">
                        {{ $bidang['title'] }}
                    </h2>
                    <p class="mt-4 text-gray-600 leading-relaxed text-lg">
                        {{ $bidang['description'] }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>

    @once
    <style>
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-up {
            animation: fadeInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        .reveal-on-scroll {
            opacity: 0;
            transform: translateY(40px);
            transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: transform, opacity;
        }
        .reveal-on-scroll.active {
            opacity: 1;
            transform: translateY(0);
        }
    </style>

    <script>
        (function () {
            let observer = null;

            function initObserver() {
                if (observer) observer.disconnect();

                observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('active');
                            observer.unobserve(entry.target); // stop observing setelah aktif
                        }
                    });
                }, { threshold: 0.1, rootMargin: '-80px' });

                document.querySelectorAll('.reveal-on-scroll').forEach(el => observer.observe(el));
            }

            document.addEventListener('livewire:navigated', initObserver);
            document.addEventListener('DOMContentLoaded', initObserver);
        })();
    </script>
    @endonce
</div>