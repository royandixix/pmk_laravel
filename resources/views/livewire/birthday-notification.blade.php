<div>
    <flux:dropdown position="bottom" align="end">
        <!-- Tombol notifikasi dengan icon bell -->
        <flux:button variant="subtle" icon="bell" class="relative">
            @if(count($members) > 0)
                <!-- Badge merah dengan angka -->
                <span class="absolute top-0 right-0 -mt-1 -mr-1 flex h-4 w-4">
                    <!-- Ping animation -->
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                    <!-- Angka notifikasi -->
                    <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500 text-white text-[10px] items-center justify-center font-bold">
                        {{ count($members) }}
                    </span>
                </span>
            @endif
        </flux:button>

        <!-- Dropdown menu -->
        <flux:menu class="w-72 rounded-lg shadow-lg bg-zinc-900">
            <div class="p-3 border-b border-zinc-700">
                <p class="text-sm font-semibold text-slate-200">
                    🎂 Ulang Tahun Hari Ini
                </p>
            </div>

            @forelse($members as $member)
                <flux:menu.item icon="cake" class="hover:bg-zinc-800 transition-colors duration-200">
                    <div class="flex justify-between items-center gap-2">
                        <span class="font-medium text-slate-100">{{ $member->name }}</span>
                        <span class="text-xs text-slate-400">{{ \Carbon\Carbon::parse($member->tanggal_lahir)->format('d M') }}</span>
                    </div>
                </flux:menu.item>
            @empty
                <div class="p-3 text-sm text-slate-400">
                    Tidak ada yang ulang tahun hari ini 🎉
                </div>
            @endforelse
        </flux:menu>
    </flux:dropdown>
</div>