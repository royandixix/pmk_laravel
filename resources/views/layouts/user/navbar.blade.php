<flux:header container class="bg-black/95 backdrop-blur-xl border-b border-white/20 sticky top-0 z-50 py-5">
    
    <!-- Wrapper Alpine.js -->
    <div x-data="{ 
        left: 0, 
        width: 0, 
        opacity: 0,
        pengurusOpen: false,
        kegiatanOpen: false,
        move(el) {
            this.left = el.offsetLeft;
            this.width = el.offsetWidth;
            this.opacity = 1;
        },
        hide() {
            this.opacity = 0;
        },
        toggleDropdown(name) {
            if(name === 'pengurus') this.pengurusOpen = !this.pengurusOpen;
            if(name === 'kegiatan') this.kegiatanOpen = !this.kegiatanOpen;
        }
    }" class="flex items-center gap-4">

        <!-- Logo -->
        <a href="{{ route('home') }}" wire:navigate class="flex items-center gap-4 group">
            <img src="{{ asset('assets/logo/Logo PMK NEW-1.png') }}" alt="Logo PMK" class="h-12 w-auto transition-transform duration-500 group-hover:scale-110" />
            <div class="flex flex-col">
                <span class="text-white font-black tracking-[0.25em] group-hover:text-indigo-400 transition uppercase text-sm leading-none">
                    pmk.undipa
                </span>
                <span class="text-[10px] text-slate-500 font-bold tracking-widest uppercase mt-1">
                    Universitas Dipa Makassar
                </span>
            </div>
        </a>

        <flux:spacer class="hidden lg:block" />
        <div class="relative flex items-center gap-10 max-lg:hidden" x-on:mouseleave="hide()">
            <div class="absolute bottom-[-10px] h-[2px] bg-white transition-all duration-300 ease-out pointer-events-none"
                 :style="`left: ${left}px; width: ${width}px; opacity: ${opacity};`"></div>

            <a href="{{ route('home') }}" x-on:mouseenter="move($el)" wire:navigate class="text-xs font-black tracking-[0.2em] uppercase text-white hover:text-indigo-400 transition-colors py-2">Beranda</a>
            <a href="{{ route('visimisi') }}" x-on:mouseenter="move($el)" wire:navigate class="text-xs font-black tracking-[0.2em] uppercase text-white hover:text-indigo-400 transition-colors py-2">Visi Misi</a>

            <!-- Dropdown Pengurus -->
            <div class="relative" x-on:mouseenter="move($el)" x-on:mouseleave="pengurusOpen = false">
                <div x-on:click="toggleDropdown('pengurus')" class="text-xs font-black tracking-[0.2em] uppercase cursor-pointer text-white hover:text-indigo-400 py-2 flex items-center gap-1">
                    Pengurus <flux:icon.chevron-down variant="micro" />
                </div>
                <div x-show="pengurusOpen" x-transition class="absolute left-0 pt-4 min-w-64 bg-zinc-950 border border-white/10 p-2 shadow-2xl z-50">
                    
                    <a href="{{ route('user.pengurus.kerohanian') }}" wire:navigate class="block px-4 py-2 text-xs uppercase tracking-wider text-slate-300 hover:bg-indigo-600 hover:text-white transition">Kerohanian</a>
                    <a href="{{ route('user.pengurus.kaderisasi') }}" wire:navigate class="block px-4 py-2 text-xs uppercase tracking-wider text-slate-300 hover:bg-indigo-600 hover:text-white transition">Kaderisasi</a>
                    <a href="{{ route('user.pengurus.humas') }}" wire:navigate class="block px-4 py-2 text-xs uppercase tracking-wider text-slate-300 hover:bg-indigo-600 hover:text-white transition">Humas</a>
                    <a href="{{ route('user.pengurus.studyclub') }}" wire:navigate class="block px-4 py-2 text-xs uppercase tracking-wider text-slate-300 hover:bg-indigo-600 hover:text-white transition">Study Club</a>
                    <a href="{{ route('user.pengurus.minatbakat') }}" wire:navigate class="block px-4 py-2 text-xs uppercase tracking-wider text-slate-300 hover:bg-indigo-600 hover:text-white transition">Minat & Bakat</a>
                    <a href="{{ route('user.pengurus.kesda') }}" wire:navigate class="block px-4 py-2 text-xs uppercase tracking-wider text-slate-300 hover:bg-indigo-600 hover:text-white transition">Kesda</a>
                </div>
            </div>

            <!-- Dropdown Kegiatan -->
            <div class="relative" x-on:mouseenter="move($el)" x-on:mouseleave="kegiatanOpen = false">
                <div x-on:click="toggleDropdown('kegiatan')" class="text-xs font-black tracking-[0.2em] uppercase cursor-pointer text-white hover:text-indigo-400 py-2 flex items-center gap-1">
                    Kegiatan <flux:icon.chevron-down variant="micro" />
                </div>
                <div x-show="kegiatanOpen" x-transition class="absolute left-0 pt-4 min-w-56 bg-zinc-950 border border-white/10 p-2 shadow-2xl z-50">
                    <a href="{{ route('user.kegiatan.index') }}" wire:navigate class="block px-4 py-2 font-black text-indigo-400 border-b border-white/10 pb-2 mb-2 tracking-widest uppercase text-[10px] hover:bg-white/5">List Kegiatan</a>
                    <a href="{{ route('user.kegiatan.ldk') }}" wire:navigate class="block px-4 py-2 text-xs uppercase tracking-wider text-slate-300 hover:bg-indigo-600 hover:text-white transition">LDK</a>
                    <a href="{{ route('user.kegiatan.maper') }}" wire:navigate class="block px-4 py-2 text-xs uppercase tracking-wider text-slate-300 hover:bg-indigo-600 hover:text-white transition">MAPER</a>
                    <a href="{{ route('user.kegiatan.paska') }}" wire:navigate class="block px-4 py-2 text-xs uppercase tracking-wider text-slate-300 hover:bg-indigo-600 hover:text-white transition">PASKA</a>
                    <a href="{{ route('user.kegiatan.platda') }}" wire:navigate class="block px-4 py-2 text-xs uppercase tracking-wider text-slate-300 hover:bg-indigo-600 hover:text-white transition">PLATDA</a>
                </div>
            </div>

            <a href="{{ route('lokasi') }}" x-on:mouseenter="move($el)" wire:navigate class="text-xs font-black tracking-[0.2em] uppercase text-white hover:text-indigo-400 transition-colors py-2">Lokasi</a>
        </div>

        <flux:spacer class="hidden lg:block" />

        <!-- Akun Desktop -->
        <div class="hidden lg:flex items-center gap-4">
            <div class="relative group dropdown-hover">
                <div class="cursor-pointer p-2 rounded-full border border-white/10 hover:border-indigo-400 hover:bg-white/5 transition-all duration-300">
                    <flux:icon.user variant="outline" class="text-white group-hover:text-indigo-400 w-6 h-6" />
                </div>
                <div class="absolute right-0 pt-4 opacity-0 invisible translate-y-2 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-300 ease-out z-50">
                    <div class="min-w-40 bg-zinc-950 border border-white/10 p-2 shadow-2xl">
                        <a href="/login" wire:navigate class="flex items-center gap-3 px-4 py-2 text-[10px] font-black uppercase tracking-widest text-slate-300 hover:bg-indigo-600 hover:text-white transition">
                            <flux:icon.key variant="micro" />
                            Login Akun
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Toggle Mobile + User Icon -->
        <div class="lg:hidden flex items-center gap-3 ml-auto mr-0">
            <a href="/login" wire:navigate class="p-2 rounded-full border border-white/10 hover:border-indigo-400 hover:bg-white/5 transition-all duration-300">
                <flux:icon.user variant="outline" class="text-white w-5 h-5" />
            </a>
            <flux:sidebar.toggle icon="bars-2" inset="right" class="text-white scale-125" />
        </div>

    </div> <!-- end Alpine wrapper -->
</flux:header>

<!-- Sidebar Mobile -->
<flux:sidebar stashable sticky class="lg:hidden bg-zinc-950 border-r border-white/10">
    <flux:sidebar.toggle icon="x-mark" class="ml-auto text-white" />
    
    <flux:navlist variant="outline" class="pt-8 gap-2">
        <flux:navlist.item href="{{ route('home') }}" icon="home">Beranda</flux:navlist.item>
        <flux:navlist.item href="{{ route('visimisi') }}" icon="academic-cap">Visi Misi</flux:navlist.item>
        <flux:navlist.item href="{{ route('lokasi') }}" icon="map-pin">Lokasi</flux:navlist.item>

        <!-- Dropdown Pengurus Mobile -->
        <flux:navlist.group x-data="{ open: false }">
            <div x-on:click="open = !open" class="flex justify-between items-center cursor-pointer px-4 py-2">
                <span>Pengurus</span>
                <span x-bind:class="open ? 'rotate-180' : ''" class="transition-transform duration-300 inline-flex">
                    <flux:icon.chevron-down />
                </span>
            </div>
            <div x-show="open" x-transition class="pl-4">
                
                <flux:navlist.item href="{{ route('user.pengurus.kerohanian') }}">Kerohanian</flux:navlist.item>
                <flux:navlist.item href="{{ route('user.pengurus.kaderisasi') }}">Kaderisasi</flux:navlist.item>
                <flux:navlist.item href="{{ route('user.pengurus.humas') }}">Humas</flux:navlist.item>
                <flux:navlist.item href="{{ route('user.pengurus.studyclub') }}">Study Club</flux:navlist.item>
                <flux:navlist.item href="{{ route('user.pengurus.minatbakat') }}">Minat & Bakat</flux:navlist.item>
                <flux:navlist.item href="{{ route('user.pengurus.kesda') }}">Kesda</flux:navlist.item>
            </div>
        </flux:navlist.group>

        <!-- Dropdown Kegiatan Mobile -->
        <flux:navlist.group x-data="{ open: false }">
            <div x-on:click="open = !open" class="flex justify-between items-center cursor-pointer px-4 py-2">
                <span>Kegiatan</span>
                <span x-bind:class="open ? 'rotate-180' : ''" class="transition-transform duration-300 inline-flex">
                    <flux:icon.chevron-down />
                </span>
            </div>
            <div x-show="open" x-transition class="pl-4">
                <flux:navlist.item href="{{ route('user.kegiatan.index') }}">List Kegiatan</flux:navlist.item>
                <flux:navlist.item href="{{ route('user.kegiatan.ldk') }}">LDK</flux:navlist.item>
                <flux:navlist.item href="{{ route('user.kegiatan.maper') }}">MAPER</flux:navlist.item>
                <flux:navlist.item href="{{ route('user.kegiatan.paska') }}">PASKA</flux:navlist.item>
                <flux:navlist.item href="{{ route('user.kegiatan.platda') }}">PLATDA</flux:navlist.item>
            </div>
        </flux:navlist.group>

        <!-- Login -->
        <flux:navlist.group label="Menu Akun" class="mt-4 pt-4 border-t border-white/5">
            <flux:navlist.item href="/login" icon="key">Login</flux:navlist.item>
        </flux:navlist.group>
    </flux:navlist>
</flux:sidebar>

<style>
.dropdown-hover:hover .absolute {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}
</style>