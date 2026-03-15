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
 
    public function mount()
    {
        $this->totalAnggota = Anggota::count();

        $this->anggotaAktif = Anggota::where('jenis','biasa')->count();

        $this->ulangTahunBulanIni =
            Anggota::whereMonth('tanggal_lahir', Carbon::now()->month)->count();

        $this->anggotaBaru =
            Anggota::whereMonth('created_at', Carbon::now()->month)->count();

        $monthly = Anggota::selectRaw('MONTH(created_at) as bulan, COUNT(*) as total')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        $this->chartLabels = $monthly
            ->pluck('bulan')
            ->map(function ($m) {
                return Carbon::create()->month((int) $m)->translatedFormat('M');
            })
            ->values()
            ->toArray();

        $this->chartData = $monthly
            ->pluck('total')
            ->values()
            ->toArray();
    }
};

?>

<div>

<style>
.db-card {
    background: #111318;
    border: 1px solid rgba(255,255,255,0.07);
    border-radius: 12px;
    padding: 1.25rem 1.5rem;
    transition: all .2s ease;
}

.db-card:hover {
    border-color: rgba(255,255,255,0.15);
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

@media (max-width: 640px) {

    .db-stat {
        font-size: 1.4rem;
    }

    .db-label {
        font-size: 0.7rem;
    }

    .db-card {
        padding: 1rem;
    }

}
</style>


<div class="flex justify-between items-end mb-8">
    <div>
        <p class="text-xs uppercase tracking-widest text-teal-400 font-semibold">
            Overview
        </p>
        <h1 class="text-2xl font-bold text-slate-100">
            Dashboard Admin
        </h1>
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


<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    <div class="db-card">

        <h3 class="text-sm font-semibold text-slate-200 mb-4">
            Pertumbuhan (Line)
        </h3>

        <div class="h-64">
            <canvas id="lineChart"></canvas>
        </div>

    </div>


    <div class="db-card">

        <h3 class="text-sm font-semibold text-slate-200 mb-4">
            Statistik Bulanan (Bar)
        </h3>

        <div class="h-64">
            <canvas id="barChart"></canvas>
        </div>

    </div>


    <div class="db-card">

        <h3 class="text-sm font-semibold text-slate-200 mb-4">
            Status Anggota (Donut)
        </h3>

        <div class="h-64">
            <canvas id="donutChart"></canvas>
        </div>

    </div>

</div>

</div>


@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

document.addEventListener('livewire:navigated', initCharts);
document.addEventListener('DOMContentLoaded', initCharts);

function initCharts() {

    if (window.lineChartInstance) window.lineChartInstance.destroy();
    if (window.barChartInstance) window.barChartInstance.destroy();
    if (window.donutChartInstance) window.donutChartInstance.destroy();

    const lineEl  = document.getElementById('lineChart');
    const barEl   = document.getElementById('barChart');
    const donutEl = document.getElementById('donutChart');

    if (!lineEl || !barEl || !donutEl) return;

    window.lineChartInstance = new Chart(lineEl, {

        type: 'line',

        data: {
            labels: @json($chartLabels),

            datasets: [{
                label: 'Anggota',
                data: @json($chartData),
                borderColor: '#2dd4bf',
                backgroundColor: 'rgba(45,212,191,0.15)',
                fill: true,
                tension: 0.4,
                pointRadius: 4
            }]
        },

        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } }
        }

    });


    window.barChartInstance = new Chart(barEl, {

        type: 'bar',

        data: {
            labels: @json($chartLabels),

            datasets: [{
                label: 'Total Pendaftar',
                data: @json($chartData),
                backgroundColor: '#38bdf8',
                borderRadius: 4
            }]
        },

        options: {
            responsive: true,
            maintainAspectRatio: false,

            plugins: {
                legend: { display: false }
            },

            scales: {
                y: {
                    beginAtZero: true,
                    grid: { color: 'rgba(255,255,255,0.05)' }
                },

                x: {
                    grid: { display: false }
                }
            }

        }

    });


    window.donutChartInstance = new Chart(donutEl, {

        type: 'doughnut',

        data: {
            labels: ['Aktif','Nonaktif'],

            datasets: [{
                data: [
                    {{ $anggotaAktif }},
                    {{ $totalAnggota - $anggotaAktif }}
                ],

                backgroundColor: ['#2dd4bf','#334155'],
                borderWidth: 0
            }]
        },

        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '70%',

            plugins: {
                legend: {
                    position: 'bottom',
                    labels: { color: '#94a3b8' }
                }
            }
        }

    });

}

</script>

@endpush