<div 
    x-data="{ 
        show: false, 
        message: '',
        notify(msg) {
            this.message = msg;
            this.show = true;
            setTimeout(() => this.show = false, 3000);
        }
    }"
    @notify-admin.window="notify($event.detail)"
    class="fixed bottom-10 right-10 z-[100]"
>
    <div 
        x-show="show" 
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-10"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90"
        class="bg-zinc-900 border border-indigo-500/50 text-white px-6 py-4 shadow-[0_0_30px_rgba(79,70,229,0.2)] flex items-center gap-4"
        style="display: none;"
    >
        <div class="h-8 w-8 rounded-full bg-indigo-500/20 flex items-center justify-center">
            <flux:icon.lock variant="micro" class="text-indigo-400" />
        </div>
        <div class="flex flex-col">
            <span class="text-[10px] font-black uppercase tracking-[0.2em] text-indigo-400 leading-none">Akses Ditolak</span>
            <span class="text-[11px] font-bold text-gray-300 uppercase tracking-widest mt-1.5" x-text="message"></span>
        </div>
    </div>
</div>