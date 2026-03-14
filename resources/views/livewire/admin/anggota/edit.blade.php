<?php

use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use App\Models\Anggota;

new #[Layout('layouts.app')] class extends Component {

    use WithFileUploads;

    public Anggota $anggota;

    public $name, $umur, $tanggal_lahir, $gender, $jenis, $phone, $photo, $oldPhoto;

    public function mount(Anggota $anggota)
    {
        $this->anggota = $anggota;
        $this->name = $anggota->name;
        $this->umur = $anggota->umur;
        $this->tanggal_lahir = $anggota->tanggal_lahir;
        $this->gender = $anggota->gender;
        $this->jenis = $anggota->jenis;
        $this->phone = $anggota->phone;
        $this->oldPhoto = $anggota->photo;
    }

    public function update()
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
        } else {
            $validated['photo'] = $this->oldPhoto;
        }

        $this->anggota->update($validated);

        session()->flash('success', 'Data berhasil diperbarui!');
        return $this->redirect('/admin/anggota', navigate: true);
    }
};
?>
<div class="space-y-6 max-w-4xl mx-auto">

    <div class="flex items-center justify-between">
        <div>
            <flux:heading size="xl">Edit Anggota</flux:heading>
            <flux:subheading>
                Perbarui informasi anggota: <strong>{{ $anggota->name }}</strong>
            </flux:subheading>
        </div>

        <flux:button href="/admin/anggota" variant="ghost" icon="arrow-left" wire:navigate>
            Kembali
        </flux:button>
    </div>

    <form wire:submit="update" class="space-y-6">

        <flux:card class="space-y-6">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <flux:input
                    label="Nama Lengkap"
                    wire:model="name"
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
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </flux:select>

                <flux:select
                    label="Jenis Anggota"
                    wire:model="jenis"
                    required
                >
                    <option value="biasa">Anggota Biasa</option>
                    <option value="luar_biasa">Anggota Luar Biasa</option>
                </flux:select>

                <flux:input
                    label="Nomor Telepon"
                    wire:model="phone"
                    required
                />

            </div>

            {{-- FOTO --}}
            <div class="space-y-4">
                <flux:label>Foto Profil</flux:label>

                <div class="flex items-center gap-6">

                    @if ($photo)
                        <flux:avatar :src="$photo->temporaryUrl()" size="xl" />
                    @elseif ($oldPhoto)
                        <flux:avatar :src="asset('storage/' . $oldPhoto)" size="xl" />
                    @else
                        <flux:avatar size="xl" />
                    @endif

                    <div class="space-y-2">
                        <input type="file" wire:model="photo" accept="image/*">

                        <div wire:loading wire:target="photo" class="text-sm text-indigo-600">
                            Mengupload foto...
                        </div>

                        <p class="text-xs text-gray-500">
                            Format JPG/PNG. Maksimal 5MB.
                        </p>
                    </div>

                </div>
            </div>

        </flux:card>

        <div class="flex justify-end gap-3">
            <flux:button href="/admin/anggota" variant="ghost" wire:navigate>
                Batal
            </flux:button>

            <flux:button type="submit" variant="primary">
                <span wire:loading.remove wire:target="update">
                    Simpan Perubahan
                </span>

                <span wire:loading wire:target="update">
                    Menyimpan...
                </span>
            </flux:button>
        </div>

    </form>

</div>