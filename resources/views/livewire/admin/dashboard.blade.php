<?php

use Livewire\Volt\Component;
use App\Models\Anggota;
use Carbon\Carbon;

new class extends Component {

    public $totalAnggota;
    public $anggotaAktif;
    public $ulangTahunBulanIni;
    public $anggotaBaru;

    public $chartLabels = [];
    public $chartData   = [];

    public $angkatanLabels = [];
    public $angkatanData   = [];

    public function mount()
    {
        $this->totalAnggota = Anggota::count();

        $this->anggotaAktif = Anggota::where('jenis', 'biasa')->count();

        $this->ulangTahunBulanIni =
            Anggota::whereMonth('tanggal_lahir', Carbon::now()->month)->count();

        $this->anggotaBaru =
            Anggota::whereMonth('created_at', Carbon::now()->month)->count();

        $monthly = Anggota::selectRaw('YEAR(created_at) as tahun, MONTH(created_at) as bulan, COUNT(*) as total')
            ->groupBy('tahun', 'bulan')
            ->orderBy('tahun')
            ->orderBy('bulan')
            ->get();

        $this->chartLabels = $monthly
            ->map(function ($item) {
                return Carbon::create()
                    ->year($item->tahun)
                    ->month($item->bulan)
                    ->translatedFormat('M Y');
            })
            ->toArray();

        $this->chartData = $monthly
            ->pluck('total')
            ->toArray();

        $angkatan = Anggota::selectRaw('tahun_angkatan, COUNT(*) as total')
            ->groupBy('tahun_angkatan')
            ->orderBy('tahun_angkatan')
            ->get();

        $this->angkatanLabels = $angkatan->pluck('tahun_angkatan')->toArray();
        $this->angkatanData   = $angkatan->pluck('total')->toArray();
    }
};

?>

<div class="p-6">
    <style>
        .db-card {
            background: #111318;
            border: 1px solid rgba(255, 255, 255, 0.07);
            border-radius: 12px;
            padding: 1.25rem 1.5rem;
            transition: all .2s ease;
        }

        .db-card:hover {
            border-color: rgba(255, 255, 255, 0.15);
            transform: translateY(-3px);
        }

        .db-stat {
            font-size: 1.8rem;
            font-weight: 700;
            color: #f1f5f9;
        }

        .db-label {
            font-size: 0.8rem;
            color: #64748b;
        }
    </style>

    <div class="flex justify-between items-end mb-8">
        <div>
            <p class="text-xs uppercase tracking-widest text-teal-400 font-semibold">Overview</p>
            <h1 class="text-2xl font-bold text-slate-100">Dashboard Admin</h1>
        </div>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
        <div class="db-card border-t-2 border-teal-400">
            <div class="db-stat">{{ $totalAnggota }}</div>
            <div class="db-label">Total Anggota</div>
        </div>

        <div class="db-card border-t-2 border-sky-400">
            <div class="db-stat">{{ $anggotaAktif }}</div>
            <div class="db-label">Anggota Aktif</div>
        </div>

        <div class="db-card border-t-2 border-amber-400">
            <div class="db-stat">{{ $ulangTahunBulanIni }}</div>
            <div class="db-label">Ulang Tahun</div>
        </div>

        <div class="db-card border-t-2 border-purple-400">
            <div class="db-stat">{{ $anggotaBaru }}</div>
            <div class="db-label">Anggota Baru</div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        <div class="db-card">
            <h3 class="text-sm font-semibold text-slate-200 mb-4">Pertumbuhan Anggota (Line)</h3>
            <div class="h-64">
                <canvas id="lineChart"></canvas>
            </div>
        </div>

        <div class="db-card">
            <h3 class="text-sm font-semibold text-slate-200 mb-4">Statistik Pendaftaran (Bar)</h3>
            <div class="h-64">
                <canvas id="barChart"></canvas>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="db-card lg:col-span-2">
            <h3 class="text-sm font-semibold text-slate-200 mb-4">Distribusi Per Angkatan</h3>
            <div class="h-64">
                <canvas id="angkatanChart"></canvas>
            </div>
        </div>

        <div class="db-card">
            <h3 class="text-sm font-semibold text-slate-200 mb-4">Rasio Status</h3>
            <div class="h-64">
                <canvas id="donutChart"></canvas>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('livewire:navigated', () => {
            initCharts();
        });

        document.addEventListener('DOMContentLoaded', () => {
            initCharts();
        });

        function initCharts() {
            const charts = [
                'lineChartInstance', 
                'barChartInstance', 
                'donutChartInstance', 
                'angkatanChartInstance'
            ];
            
            charts.forEach(chart => {
                if (window[chart]) window[chart].destroy();
            });

            const commonOptions = {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: { color: '#94a3b8' }
                    }
                },
                scales: {
                    y: {
                        ticks: { color: '#64748b' },
                        grid: { color: 'rgba(255,255,255,0.05)' }
                    },
                    x: {
                        ticks: { color: '#64748b' },
                        grid: { display: false }
                    }
                }
            };

            const lineEl = document.getElementById('lineChart');
            if (lineEl) {
                window.lineChartInstance = new Chart(lineEl, {
                    type: 'line',
                    data: {
                        labels: @json($chartLabels),
                        datasets: [{
                            label: 'Anggota',
                            data: @json($chartData),
                            borderColor: '#2dd4bf',
                            backgroundColor: 'rgba(45,212,191,0.1)',
                            fill: true,
                            tension: 0.4
                        }]
                    },
                    options: commonOptions
                });
            }

            const barEl = document.getElementById('barChart');
            if (barEl) {
                window.barChartInstance = new Chart(barEl, {
                    type: 'bar',
                    data: {
                        labels: @json($chartLabels),
                        datasets: [{
                            label: 'Pendaftar',
                            data: @json($chartData),
                            backgroundColor: '#38bdf8',
                            borderRadius: 4
                        }]
                    },
                    options: commonOptions
                });
            }

            const angkatanEl = document.getElementById('angkatanChart');
            if (angkatanEl) {
                window.angkatanChartInstance = new Chart(angkatanEl, {
                    type: 'bar',
                    data: {
                        labels: @json($angkatanLabels),
                        datasets: [{
                            label: 'Jumlah per Angkatan',
                            data: @json($angkatanData),
                            backgroundColor: '#a78bfa',
                            borderRadius: 4
                        }]
                    },
                    options: {
                        ...commonOptions,
                        indexAxis: 'y' // Membuat diagram balok horizontal
                    }
                });
            }

            const donutEl = document.getElementById('donutChart');
            if (donutEl) {
                window.donutChartInstance = new Chart(donutEl, {
                    type: 'doughnut',
                    data: {
                        labels: ['Aktif', 'Nonaktif'],
                        datasets: [{
                            data: [{{ $anggotaAktif }}, {{ $totalAnggota - $anggotaAktif }}],
                            backgroundColor: ['#2dd4bf', '#334155'],
                            borderWidth: 0
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { position: 'bottom', labels: { color: '#94a3b8' } }
                        }
                    }
                });
            }
        }
    </script>
    @endpush
</div>