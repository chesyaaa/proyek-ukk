<?php

namespace App\Livewire\Pkl;

use Livewire\Component;
use App\Models\Siswa;
use App\Models\Industri;

class Create extends Component
{
    public $mulai;
    public $selesai;
    public $siswa_id;
    public $industri_id;
    public $siswas;
    public $industris;
    public function simpan()
    {
        // validasi & simpan data
    }

    public function mount()
    {
        $this->siswas = Siswa::all();
        $this->industris = Industri::all();
    }

    public function render()
    {
        return view('livewire.pkl.create');
    }
}
