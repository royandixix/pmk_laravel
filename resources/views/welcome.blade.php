{{-- resources/views/welcome.blade.php --}}
<x-user.layouts.user>
    {{-- Header Beranda --}}
    <x-user.header />

    {{-- Panggil komponen-komponennya di sini, BUKAN di layout --}}
    <livewire:user.visimisi.index />
    <livewire:user.struktural.index />
    <livewire:user.pengurus.index />

    <livewire:user.kegiatan.index />
    <livewire:user.lokasi.index/>
</x-user.layouts.user>