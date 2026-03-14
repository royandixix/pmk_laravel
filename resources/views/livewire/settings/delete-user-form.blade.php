<section class="mt-10 space-y-6">
    <div class="relative mb-5">
        <flux:heading>Hapus Akun</flux:heading>
        <flux:subheading>Hapus akun Anda beserta semua sumber dayanya</flux:subheading>
    </div>

    <flux:modal.trigger name="confirm-user-deletion">
        <flux:button variant="danger" x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
            Hapus Akun
        </flux:button>
    </flux:modal.trigger>

    <flux:modal name="confirm-user-deletion" :show="$errors->isNotEmpty()" focusable class="max-w-lg">
        <form method="POST" wire:submit="deleteUser" class="space-y-6">
            <div>
                <flux:heading size="lg">Apakah Anda yakin ingin menghapus akun Anda?</flux:heading>

                <flux:subheading>
                    Setelah akun Anda dihapus, semua sumber daya dan data akan dihapus secara permanen.  
                    Masukkan kata sandi Anda untuk mengonfirmasi bahwa Anda ingin menghapus akun secara permanen.
                </flux:subheading>
            </div>

            <flux:input wire:model="password" :label="'Kata Sandi'" type="password" />

            <div class="flex justify-end space-x-2 rtl:space-x-reverse">
                <flux:modal.close>
                    <flux:button variant="filled">Batal</flux:button>
                </flux:modal.close>

                <flux:button variant="danger" type="submit">Hapus Akun</flux:button>
            </div>
        </form>
    </flux:modal>
</section>