<?php

namespace App\Http\Livewire\User\Struktural;

use Livewire\Component;

class Index extends Component
{
    public array $leaders = [];
    public int $activeIndex = 0;

    public function mount()
    {
        $this->leaders = [
            ['id'=>'1','name'=>'SINTA SATTU','role'=>'Sekretaris','imageUrl'=>'/img/pengurus/sekertaris/SINTA SATTU-min.jpg'],
            ['id'=>'2','name'=>'ANDRIB ARIB','role'=>'Ketua Umum','imageUrl'=>'/img/pengurus/ketua/ANDRIB ARIB-min.jpg'],
            ['id'=>'3','name'=>'JESLY PUTRI TIRANDA','role'=>'Bendahara','imageUrl'=>'/img/pengurus/bendahara/JESLY PUTRI TIRANDA.JPG'],
            ['id'=>'4','name'=>'NATALIA ARRUAN','role'=>'Wakil Ketua','imageUrl'=>'/img/pengurus/wakil/NATALIA ARRUAN.jpg'],
        ];

        $this->activeIndex = collect($this->leaders)
            ->search(fn($l) => strtolower($l['role']) === 'ketua umum') ?? 0;
    }

    public function setActive(int $index)
    {
        $this->activeIndex = $index;
    }

    public function render()
    {
        // Jangan pakai heredoc, langsung return view
        return view('livewire.user.struktural.index');
    }
}