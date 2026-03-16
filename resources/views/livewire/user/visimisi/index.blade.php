<?php

use Livewire\Volt\Component;
use App\Models\Anggota;

new class extends Component {
    public int $biasa = 0;
    public int $luarBiasa = 0;
    public int $total = 0;

    public function mount(): void
    {
        $this->biasa = Anggota::where('jenis', 'biasa')->count();
        $this->luarBiasa = Anggota::where('jenis', 'luar_biasa')->count();
        $this->total = $this->biasa + $this->luarBiasa;
    }

    public function rendering($view)
    {
        return $view->layout('components.user.layouts.user');
    }
};
?>

@php
    $counters = [
        ['target' => $biasa, 'label' => 'Anggota Biasa', 'color' => 'text-white'],
        ['target' => $luarBiasa, 'label' => 'Anggota Luar Biasa', 'color' => 'text-white'],
        ['target' => $total, 'label' => 'Total Anggota', 'color' => 'text-indigo-400'],
    ];
@endphp

<section x-data="{ isInView: false }" x-intersect.once="isInView = true" class="bg-[#0f1116] py-24 lg:py-32 min-h-screen">
    <div class="max-w-7xl mx-auto grid lg:grid-cols-12 gap-x-16 items-center px-4 md:px-6 lg:px-8">

        {{-- FOTO + STATISTIK --}}
        <div class="lg:col-span-6 flex flex-col items-center text-center lg:text-left transition-all duration-1000 transform"
            :class="isInView ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'">
            <img src="{{ asset('img/pengurus/pengurus terpilih-min.JPG') }}" alt="PMK Universitas Dipa Makassar"
                class="rounded-lg shadow-2xl w-full max-w-lg mb-8 border border-white/10" />

            <div class="text-white w-full">
                <h3 class="text-xl text-indigo-400 uppercase tracking-wide mb-6">Jumlah Anggota PMK</h3>

                <div class="grid grid-cols-3 gap-6">
                    @foreach ($counters as $counter)
                        <div x-data="{ current: 0 }" x-init="$watch('isInView', v => {
                            if (!v) return;
                            const target = {{ $counter['target'] }};
                            const start = performance.now();
                            const tick = now => {
                                const p = Math.min((now - start) / 2000, 1);
                                current = Math.floor(p * target);
                                if (p < 1) requestAnimationFrame(tick);
                            };
                            requestAnimationFrame(tick);
                        })">
                            <p class="text-4xl font-bold {{ $counter['color'] }}" x-text="current">0</p>
                            <p class="text-gray-400 text-sm">{{ $counter['label'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- VISI MISI --}}
        <div class="lg:col-span-6 mt-12 lg:mt-0 transition-all duration-1000 delay-300 transform"
            :class="isInView ? 'opacity-100 translate-x-0' : 'opacity-0 translate-x-10'">
            <h2 class="text-base text-indigo-400 uppercase tracking-wide font-semibold">
                PROFIL ORGANISASI
            </h2>
            <h3 class="mt-2 text-4xl sm:text-5xl font-bold text-white leading-tight">
                Visi dan Misi PMK Universitas Dipa Makassar
            </h3>

            <p class="mt-6 text-gray-300 text-lg leading-relaxed">
                Menghasilkan sarjana Kristen yang injili dan bermisi sehingga dapat
                menjadi berkat bagi lingkungan di sekitarnya.
            </p>

            <div class="mt-12 space-y-10">

                {{-- Visi --}}
                <div class="flex items-start gap-6 group">
                    <div class="h-12 w-12 text-indigo-400 flex-shrink-0 transition-transform group-hover:scale-110">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3" />
                        </svg>
                    </div>
                    <div>
                        <dt class="text-xl text-white font-semibold">Visi</dt>
                        <dd class="mt-2 text-gray-400 leading-relaxed">
                            Menghasilkan sarjana Kristen yang injili dan bermisi sehingga dapat
                            menjadi berkat bagi lingkungan di sekitarnya.
                        </dd>
                    </div>
                </div>

                {{-- Misi --}}
                <div class="flex items-start gap-6 group">
                    <div class="h-12 w-12 text-indigo-400 flex-shrink-0 transition-transform group-hover:scale-110">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75" />
                        </svg>
                    </div>
                    <div>
                        <dt class="text-xl text-white font-semibold">Misi</dt>
                        <dd class="mt-2 text-gray-400 leading-relaxed">
                            Membina serta menyakinkan mahasiswa Kristen untuk menerima Kristus
                            sebagai Tuhan dan Juruselamat secara pribadi dan membina mahasiswa
                            Kristen agar dapat bertumbuh dan mencapai kedewasaan rohani melalui
                            Persekutuan, Kesaksian, dan Pelayanan.
                        </dd>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>
