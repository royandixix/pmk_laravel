<?php

use App\Models\Anggota;
use Livewire\Volt\Component;

new class extends Component
{
    public $members = [];

    public function mount()
    {
        $today = now();
        $this->members = Anggota::whereMonth('tanggal_lahir', $today->month)
            ->whereDay('tanggal_lahir', $today->day)
            ->orderByDesc('created_at')
            ->get();
    }

    public function with()
    {
        return [
            'count' => $this->members->count(),
        ];
    }
};
?>
<div>
    <flux:dropdown position="bottom" align="end">
        <!-- Icon dropdown: cake -->
        <flux:profile icon="cake" class="text-pink-500 relative">
            @if($members->count() > 0)
                <span class="absolute -top-1 -right-1
                             bg-red-500 text-white text-[10px]
                             rounded-full px-1.5 py-0.5
                             font-semibold animate-pulse">
                    {{ $members->count() }}
                </span>
            @endif
        </flux:profile>

        <!-- Menu Dropdown -->
        <flux:menu class="w-64 rounded-lg shadow-lg bg-zinc-900">
            <div class="p-3 border-b border-zinc-700">
                <p class="text-sm font-semibold text-slate-200">
                    🎂 Ulang Tahun Hari Ini
                </p>
            </div>

            @forelse($members as $member)
                <flux:menu.item icon="cake" class="hover:bg-zinc-800 transition-colors duration-200">
                    {{ $member->name }}
                </flux:menu.item>
            @empty
                <div class="p-3 text-sm text-slate-400">
                    Tidak ada yang ulang tahun hari ini
                </div>
            @endforelse
        </flux:menu>
    </flux:dropdown>
</div>