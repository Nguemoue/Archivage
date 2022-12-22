<?php

namespace App\Http\Livewire\Traitement;

use Livewire\Component;

class TraitementDocument extends Component
{

    /**
     * variable step 
     * si step = 1 alors on doit on affiche le document et on demande le titre
     * step 2 on regarde le type de fichier 
     * set 3 on valide
     */
    public $step = 1;

    public $titre = 'dede';
    public $type = 'acte';

    public function firstStep(){
        $this->step = 2;
    }

    function secondStep(){
        $this->step = 3;
    }

    function thirdStep(){
        // $this->step = 4;
    }
    public function render()
    {
        return view('livewire.traitement.traitement-document');
    }

    public function prev(){
        $this->step = $this->step-1;
    }
    
}
