<?php
use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use App\Models\Anggota;

new #[Layout('layouts.app')] class extends Component {
    public $search = '';

    public function with()
    {
        $query = Anggota::query()->when($this->search, function ($q) {
            $q->where('name', 'like', '%' . $this->search . '%')
              ->orWhere('phone', 'like', '%' . $this->search . '%')
              ->orWhere('nim', 'like', '%' . $this->search . '%');
        });

        return [
            'anggota' => $query->latest()->get(),
        ];
    }

    public function delete($id)
    {
        Anggota::findOrFail($id)->delete();
    }
};
?>

<div class="max-w-7xl mx-auto space-y-8">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-6">
        <div class="flex items-center gap-3">
            <flux:icon.users class="size-6 text-accent dark:text-accent-foreground" />
            <div>
                <flux:heading size="xl" level="1" class="!font-bold tracking-tight">Data Anggota</flux:heading>
                <flux:subheading class="text-zinc-500">Manajemen anggota PMK Universitas Dipa Makassar</flux:subheading>
            </div>
        </div>

        <div class="flex gap-3">
            <flux:button href="{{ route('anggota.pdf') }}" variant="outline" icon="printer" target="_blank">
                Cetak PDF
            </flux:button>

            <flux:button href="/admin/anggota/tambah" variant="primary" icon="plus" wire:navigate>
                Tambah
            </flux:button>
        </div>
    </div>

    <div class="max-w-md">
        <flux:input wire:model.live.debounce.300ms="search"
            icon="magnifying-glass"
            placeholder="Cari nama, NIM atau telepon..."
            clearable />
    </div>

    <div class="overflow-hidden rounded-2xl border border-zinc-200 dark:border-zinc-800">
        <flux:table>

            {{-- HEADER --}}
            <flux:table.columns>
                <flux:table.column class="pl-6">Anggota</flux:table.column>
                <flux:table.column>NIM & Angkatan</flux:table.column>
                <flux:table.column>Detail</flux:table.column>
                <flux:table.column>Status</flux:table.column>
                <flux:table.column>Telepon</flux:table.column>
                <flux:table.column align="right" class="pr-6">Aksi</flux:table.column>
            </flux:table.columns>

            <flux:table.rows>
                @forelse($anggota as $item)
                    <flux:table.row :key="$item->id"
                        class="group hover:bg-zinc-50 dark:hover:bg-zinc-800/40 transition">

                        {{-- NAMA --}}
                        <flux:table.cell class="pl-6 flex items-center gap-4">
                            <flux:avatar
                                :src="$item->photo ? asset('storage/' . $item->photo) : null"
                                :initials="collect(explode(' ', $item->name))->map(fn($n) => mb_substr($n, 0, 1))->take(2)->join('')"
                                size="md" />
                            <p class="font-semibold text-zinc-900 dark:text-zinc-100">
                                {{ $item->name }}
                            </p>
                        </flux:table.cell>

                        {{-- NIM & ANGKATAN --}}
                        <flux:table.cell>
                            <div class="flex flex-col text-sm">
                                <span class="font-mono">{{ $item->nim }}</span>
                                <span class="text-zinc-500">Angkatan {{ $item->tahun_angkatan }}</span>
                            </div>
                        </flux:table.cell>

                        {{-- DETAIL --}}
                        <flux:table.cell>
                            <div class="flex flex-col text-sm text-zinc-600 dark:text-zinc-400">
                                <span>{{ $item->gender }} • {{ $item->umur }} Tahun</span>
                                <span>
                                    {{ $item->tanggal_lahir 
                                        ? \Carbon\Carbon::parse($item->tanggal_lahir)->format('d M Y') 
                                        : '-' 
                                    }}
                                </span>
                            </div>
                        </flux:table.cell>

                        {{-- STATUS --}}
                        <flux:table.cell>
                            <flux:badge
                                :color="$item->jenis == 'biasa' ? 'green' : 'indigo'"
                                variant="subtle"
                                size="sm">
                                {{ ucfirst(str_replace('_', ' ', $item->jenis)) }}
                            </flux:badge>
                        </flux:table.cell>

                        {{-- TELEPON --}}
                        <flux:table.cell>
                            <span class="font-mono text-sm">{{ $item->phone }}</span>
                        </flux:table.cell>

                        {{-- AKSI --}}
                        <flux:table.cell class="pr-6">
                            <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition">
                                <flux:button
                                    href="/admin/anggota/edit/{{ $item->id }}"
                                    variant="ghost"
                                    icon="pencil-square"
                                    size="sm"
                                    wire:navigate />

                                <flux:button
                                    wire:click="delete({{ $item->id }})"
                                    wire:confirm="Hapus {{ $item->name }}?"
                                    variant="ghost"
                                    icon="trash"
                                    size="sm"
                                    color="red" />
                            </div>
                        </flux:table.cell>

                    </flux:table.row>
                @empty
                    <flux:table.row>
                        <flux:table.cell colspan="6" class="py-20 text-center">
                            <flux:heading size="lg">Tidak Ada Data</flux:heading>
                            <flux:subheading class="text-zinc-500">
                                Data anggota belum tersedia atau tidak ditemukan.
                            </flux:subheading>
                        </flux:table.cell>
                    </flux:table.row>
                @endforelse
            </flux:table.rows>

        </flux:table>
    </div>
</div>