<?php

namespace App\Livewire\Industri;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Industri;

class Index extends Component
{
    use WithPagination;
    public $search = '';

    protected $queryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $industris = Industri::query()
            ->when($this->search, function ($query) {
                $query->where('nama', 'like', '%' . $this->search . '%')
                    ->orWhere('bidang_usaha', 'like', '%' . $this->search . '%')
                    ->orWhere('alamat', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(3);

        return view('livewire.industri.index', compact('industris'));
    }
}
