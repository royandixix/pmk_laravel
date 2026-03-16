<?php
use Livewire\Volt\Component;
new class extends Component {
    public function rendering($view)
    {
        $view->layout('components.user.layouts.user');
    }
};
?>

<div class="min-h-screen bg-slate-50 font-sans">
    <div class="text-center py-20 px-6">
        <span
            class="inline-block mb-4 rounded-full bg-indigo-100 px-4 py-1 text-xs font-semibold tracking-widest text-indigo-700 uppercase">SEKRETARIAT
            PMK</span>

        <h1 class="text-4xl lg:text-5xl font-bold text-slate-900 leading-tight">
            Sekretariat PMK<br class="hidden lg:block" />Universitas Dipa Makassar
        </h1>

        <p class="mt-4 max-w-2xl mx-auto text-slate-600 text-sm lg:text-base">
            BTP, Perumahan Pesona Anindya Blok A2, No.01
        </p>
    </div>

    <div class="max-w-7xl mx-auto px-6 lg:px-12 pb-24">
        <div class="flex flex-col lg:flex-row gap-14 items-center">
            <div class="w-full lg:w-1/2 lg:-ml-24">
                <img src="/img/sekret/3.jpeg" alt="Sekretariat PMK" loading="lazy"
                    class="w-full h-[460px] object-cover shadow-xl rounded-none" />
            </div>

            <div class="w-full lg:w-1/2">
                <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 mb-4">Fasilitas & Lingkungan</h2>

                <p class="text-slate-600 leading-relaxed mb-8">
                    Sekretariat PMK menjadi pusat koordinasi dan pembinaan rohani mahasiswa. Suasana dibuat nyaman dan
                    fungsional untuk mendukung diskusi, pelayanan, serta pengembangan kepemimpinan.
                </p>

                <div class="space-y-5">
                    <div class="border-l-4 border-indigo-600 pl-4">
                        <h3 class="text-lg font-semibold text-slate-900">Forum Discussion Space</h3>
                        <p class="text-slate-600 text-sm">Ruang diskusi dan pembinaan iman yang terbuka dan nyaman.</p>
                    </div>

                    <div class="border-l-4 border-indigo-600 pl-4">
                        <h3 class="text-lg font-semibold text-slate-900">Resource & Inventory Corner</h3>
                        <p class="text-slate-600 text-sm">Penyimpanan perlengkapan ibadah dan logistik kegiatan.</p>
                    </div>

                    <div class="border-l-4 border-indigo-600 pl-4">
                        <h3 class="text-lg font-semibold text-slate-900">Creative Activity Hub</h3>
                        <p class="text-slate-600 text-sm">Tempat perencanaan dan eksekusi ide kreatif PMK.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="relative w-full h-[760px]">
        <iframe class="absolute inset-0 w-full h-full border-0 grayscale-[20%]" loading="lazy" title="Maps"
            src="https://www.google.com/maps?q=-5.12345,119.51234&z=17&output=embed"></iframe>

        <div class="absolute inset-0 bg-black/40 pointer-events-none"></div>

        <div class="relative z-10 flex h-full items-center">
            <div class="mx-auto max-w-7xl px-6 text-white w-full">

                <div class="flex items-center gap-3 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-300" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span class="uppercase tracking-widest text-sm text-indigo-200">Lokasi Sekretariat</span>
                </div>

                <h2 class="text-4xl lg:text-5xl font-bold leading-tight">
                    PMK Universitas<br />Dipa Makassar
                </h2>

                <p class="mt-5 max-w-xl text-white/90 text-lg">
                    Tampilan satelit asli lokasi sekretariat PMK Universitas Dipa Makassar.
                </p>

                <a href="https://maps.app.goo.gl/kZDrdLVDGjM1rjwz5" target="_blank" rel="noopener noreferrer"
                    class="inline-flex items-center gap-2 mt-8 rounded-lg bg-indigo-600 px-6 py-3 text-sm font-medium hover:bg-indigo-700 transition">

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                    </svg>

                    Buka di Google Maps
                </a>

            </div>
        </div>
    </section>
</div>
