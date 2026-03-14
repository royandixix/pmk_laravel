<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use App\Models\Anggota;
use Carbon\Carbon;

new #[Layout('layouts.app')] class extends Component {

    public $search = '';

    public function with()
    {
        $today = Carbon::today();

        $query = Anggota::query()
            ->whereMonth('tanggal_lahir', $today->month)
            ->whereDay('tanggal_lahir', $today->day)
            ->when($this->search, function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('phone', 'like', '%' . $this->search . '%');
            });

        return [
            'anggotaUlangTahun' => $query->latest()->get(),
            'totalCount' => $query->count(),
        ];
    }
};
?>

<div class="max-w-7xl mx-auto space-y-8">

    {{-- HEADER --}}
    <header class="flex flex-col md:flex-row md:items-end justify-between gap-6 border-b border-zinc-200 dark:border-zinc-800 pb-6">
        <div>
            <div class="flex items-center gap-3 mb-2">
                
                <flux:heading size="xl" level="1" class="!font-bold">
                    Ulang Tahun Hari Ini
                </flux:heading>
            </div>

            <flux:subheading>
                {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
            </flux:subheading>
        </div>

        <div class="text-right">
            <div class="text-xs uppercase tracking-wide text-zinc-500">
                Total Hari Ini
            </div>
            <div class="text-2xl font-bold text-yellow-200">
                {{ $totalCount }}
            </div>
        </div>
    </header>

    {{-- SEARCH --}}
    <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-center">
        <div class="md:col-span-6">
            <flux:input 
                wire:model.live.debounce.300ms="search" 
                icon="magnifying-glass" 
                placeholder="Cari nama atau telepon..."
                clearable
            />
        </div>
    </div>

    {{-- TABLE --}}
    <div class="overflow-hidden rounded-xl border border-zinc-200 dark:border-zinc-800">

        <flux:table>

            <flux:table.columns>
                <flux:table.column class="pl-6">Profil</flux:table.column>
                <flux:table.column>Tanggal Lahir</flux:table.column>
                <flux:table.column>Gender</flux:table.column>
                <flux:table.column class="pr-6">Kontak</flux:table.column>
            </flux:table.columns>

            <flux:table.rows>
                @forelse($anggotaUlangTahun as $item)

                    <flux:table.row 
                        :key="$item->id"
                        class="group transition hover:bg-amber-50/40 dark:hover:bg-amber-900/10">

                        {{-- PROFIL --}}
                        <flux:table.cell class="pl-6 flex items-center gap-4">

                            <flux:avatar 
                                :src="$item->photo ? asset('storage/' . $item->photo) : null"
                                :initials="collect(explode(' ', $item->name))
                                    ->map(fn($n) => mb_substr($n, 0, 1))
                                    ->take(2)
                                    ->join('')"
                                size="md"
                            />

                            <div class="flex flex-col">
                                <span class="font-semibold text-zinc-900 dark:text-zinc-100">
                                    {{ $item->name }}
                                </span>
                                <span class="text-xs text-amber-600 font-medium">
                                    🎉 Selamat Ulang Tahun!
                                </span>
                            </div>

                        </flux:table.cell>

                        {{-- TANGGAL --}}
                        <flux:table.cell>
                            <flux:badge color="amber" variant="subtle" size="sm">
                                {{ \Carbon\Carbon::parse($item->tanggal_lahir)->translatedFormat('d F') }}
                            </flux:badge>
                        </flux:table.cell>

                        {{-- GENDER --}}
                        <flux:table.cell>
                            <flux:badge 
                                :color="$item->gender == 'Laki-laki' ? 'blue' : 'pink'" 
                                variant="subtle" 
                                size="sm">
                                {{ $item->gender }}
                            </flux:badge>
                        </flux:table.cell>

                        {{-- PHONE --}}
                        <flux:table.cell class="pr-6">
                            <div class="flex items-center gap-2">
                                <flux:icon.phone class="w-3 h-3 text-zinc-400" />
                                <span class="font-mono text-sm">
                                    {{ $item->phone }}
                                </span>
                            </div>
                        </flux:table.cell>

                    </flux:table.row>

                @empty

                    <flux:table.row>
                        <flux:table.cell colspan="4" class="py-20 text-center">
                            <div class="flex flex-col items-center">
                                <div class="text-4xl mb-3">🎂</div>
                                <flux:heading size="lg">
                                    Tidak Ada Yang Ulang Tahun
                                </flux:heading>
                                <flux:subheading>
                                    Hari ini tidak ada anggota yang berulang tahun.
                                </flux:subheading>
                            </div>
                        </flux:table.cell>
                    </flux:table.row>

                @endforelse

            </flux:table.rows>
        </flux:table>

    </div>

</div>