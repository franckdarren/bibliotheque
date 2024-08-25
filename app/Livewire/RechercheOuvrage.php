<?php

namespace App\Livewire;

use App\Models\Ouvrage;
use Livewire\Component;
use Livewire\WithPagination;

class RechercheOuvrage extends Component
{
    use WithPagination;
    public $search = '';

    public function render()
    {
        return view('livewire.recherche-ouvrage', [
            'ouvrages' => Ouvrage::where('titre', 'like', '%' . $this->search . '%')
                ->orWhere('thematique', 'like', '%' . $this->search . '%')
                ->paginate(6),
                // ->get(),


        ]);
    }
}
