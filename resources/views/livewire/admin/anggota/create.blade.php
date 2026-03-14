<?php

use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use App\Models\Anggota;

new #[Layout('layouts.app')] class extends Component {
    use WithFileUploads;

    public $name, $umur, $tanggal_lahir, $gender, $jenis, $phone, $photo;

    public function save()
    {
        $validated = $this->validate([
            'name' => 'required|min:3',
            'umur' => 'required|numeric',
            'tanggal_lahir' => 'required|date',
            'gender' => 'required',
            'jenis' => 'required',
            'phone' => 'required',
            'photo' => 'nullable|image|max:5120',
        ]);

        if ($this->photo) {
            $validated['photo'] = $this->photo->store('photos', 'public');
        }

        Anggota::create($validated);

        session()->flash('success', 'Anggota berhasil ditambahkan!');
        return $this->redirect('/admin/anggota', navigate: true);
    }
};
?>
<div class="space-y-6 max-w-4xl mx-auto">

    <div class="flex items-center justify-between">
        <div>
            <flux:heading size="xl">Tambah Anggota</flux:heading>
            <flux:subheading>Daftarkan anggota baru ke sistem PMK</flux:subheading>
        </div>

        <flux:button href="/admin/anggota" variant="ghost" icon="arrow-left" wire:navigate>
            Kembali
        </flux:button>
    </div>

    <form wire:submit="save" class="space-y-6">

        <flux:card class="space-y-6">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <flux:input
                    label="Nama Lengkap"
                    wire:model="name"
                    placeholder="Contoh: John Doe"
                    required
                />

                <flux:input
                    label="Umur"
                    type="number"
                    wire:model="umur"
                    required
                />

                <flux:input
                    label="Tanggal Lahir"
                    type="date"
                    wire:model="tanggal_lahir"
                    required
                />

                <flux:select
                    label="Jenis Kelamin"
                    wire:model="gender"
                    required
                >
                    <option value="">Pilih Gender</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </flux:select>

                <flux:select
                    label="Jenis Anggota"
                    wire:model="jenis"
                    required
                >
                    <option value="">Pilih Jenis</option>
                    <option value="biasa">Anggota Biasa</option>
                    <option value="luar_biasa">Anggota Luar Biasa</option>
                </flux:select>

                <flux:input
                    label="Nomor Telepon"
                    wire:model="phone"
                    placeholder="08123456789"
                    required
                />

            </div>

            {{-- Upload Foto --}}
            <div class="space-y-3">
                <flux:label>Foto Profil</flux:label>

                <div class="flex items-center gap-4">
                    @if ($photo)
                        <flux:avatar
                            :src="$photo->temporaryUrl()"
                            size="lg"
                        />
                    @else
                        <flux:avatar size="lg" />
                    @endif

                    <input type="file" wire:model="photo" accept="image/*">
                </div>

                <div wire:loading wire:target="photo" class="text-sm text-indigo-600">
                    Mengupload foto...
                </div>
            </div>

        </flux:card>

        <div class="flex justify-end gap-3">
            <flux:button href="/admin/anggota" variant="ghost" wire:navigate>
                Batal
            </flux:button>

            <flux:button type="submit" variant="primary">
                <span wire:loading.remove wire:target="save">
                    Simpan Anggota
                </span>

                <span wire:loading wire:target="save">
                    Menyimpan...
                </span>
            </flux:button>
        </div>

    </form>

</div>