<?php

namespace App\Http\Livewire\Traitement;

use Livewire\Component;

class TraitementDossier extends Component
{

	public $dossier;

	function mount(){
	}
    public function render()
    {
        return view('livewire.traitement.traitement-dossier',['dossier' => $this->dossier]);
    }
}
