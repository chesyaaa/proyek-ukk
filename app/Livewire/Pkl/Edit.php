<?php

namespace App\Livewire\Pkl;

use Livewire\Component;
use App\Models\Pkl;
use App\Models\Siswa;
use App\Models\Industri;

class Edit extends Component
{
    public $pklId, $siswa_id, $industri_id, $guru_id, $mulai, $selesai;
    public $siswas, $industris;
    public $guru; // untuk readonly display

    public function mount($id)
    {
        $pkl = Pkl::with(['siswa', 'industri', 'guru'])->findOrFail($id);

        $this->pklId = $pkl->id;
        $this->siswa_id = $pkl->siswa_id;
        $this->industri_id = $pkl->industri_id;
        $this->guru_id = $pkl->guru_id;
        $this->mulai = $pkl->mulai;
        $this->selesai = $pkl->selesai;
        $this->guru = $pkl->guru;

        $this->siswas = Siswa::all();
        $this->industris = Industri::all();
    }

    public function updatePkl()
    {
        $this->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'industri_id' => 'required|exists:industris,id',
            'mulai' => 'required|date',
            'selesai' => 'required|date|after_or_equal:mulai',
        ]);

        $pkl = Pkl::findOrFail($this->pklId);
        $pkl->update([
            'siswa_id' => $this->siswa_id,
            'industri_id' => $this->industri_id,
            'mulai' => $this->mulai,
            'selesai' => $this->selesai,
            // guru_id tidak diupdate di sini
        ]);

        session()->flash('message', 'Data PKL berhasil diperbarui!');
        return redirect()->route('pkl.index');
    }

    public function render()
    {
        return view('livewire.pkl.edit');
    }
}
