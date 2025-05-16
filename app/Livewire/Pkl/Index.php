<?php

namespace App\Livewire\Pkl;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Pkl;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    // Reset halaman ke 1 saat search berubah
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Pkl::with(['siswa', 'industri', 'guru']);

        if ($this->search !== '') {
            $query->where(function ($q) {
                $q->orWhereHas('siswa', function ($query) {
                    $query->where('nama', 'like', '%' . $this->search . '%');
                });
                $q->orWhereHas('industri', function ($query) {
                    $query->where('nama', 'like', '%' . $this->search . '%');
                });
                $q->orWhereHas('guru', function ($query) {
                    $query->where('nama', 'like', '%' . $this->search . '%');
                });
            });

        }

        $pkls = $query->paginate(3);

        return view('livewire.pkl.index', compact('pkls'));
    }


}
