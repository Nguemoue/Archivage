<?php

namespace App\Http\Livewire\Traitement;

use Livewire\Component;

class TraitementDossier extends Component
{


    public $dossier;
    public function render()
    {
        return view('livewire.traitement.traitement-dossier');
    }
}
