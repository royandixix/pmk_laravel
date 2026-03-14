<section class="w-full">
    @include('partials.settings-heading')

    <flux:heading class="sr-only">Pengaturan Profil</flux:heading>

    <x-settings.layout :heading="'Profil'" :subheading="'Perbarui nama dan alamat email Anda'">
        <form wire:submit="updateProfileInformation" class="my-6 w-full space-y-6">
            <flux:input wire:model="name" :label="'Nama'" type="text" required autofocus autocomplete="name" />

            <div>
                <flux:input wire:model="email" :label="'Email'" type="email" required autocomplete="email" />

                @if ($this->hasUnverifiedEmail)
                    <div>
                        <flux:text class="mt-4">
                            Alamat email Anda belum diverifikasi.

                            <flux:link class="text-sm cursor-pointer" wire:click.prevent="resendVerificationNotification">
                                Klik di sini untuk mengirim ulang email verifikasi.
                            </flux:link>
                        </flux:text>

                        @if (session('status') === 'verification-link-sent')
                            <flux:text class="mt-2 font-medium !dark:text-green-400 !text-green-600">
                                Tautan verifikasi baru telah dikirim ke alamat email Anda.
                            </flux:text>
                        @endif
                    </div>
                @endif
            </div>

            <div class="flex items-center gap-4">
                <div class="flex items-center justify-end">
                    <flux:button variant="primary" type="submit" class="w-full">Simpan</flux:button>
                </div>

                <x-action-message class="me-3" on="profile-updated">
                    Tersimpan.
                </x-action-message>
            </div>
        </form>

        @if ($this->showDeleteUser)
            <livewire:settings.delete-user-form />
        @endif
    </x-settings.layout>
</section>