<?php

namespace App\Http\Livewire;

use App\Models\Classement;
use Livewire\Component;

class ClassementView extends Component
{
    public $classements = null;

    public $depth = 1;
    public $dossierId;
    public  $sousDepth = false;
    public $currentClassement = null;
    public $sousClassements = null;


    public function render()
    {
        return view('livewire.classement-view');
    }

    public function mount()
    {
        $this->classements = Classement::all();
    }

    function loadSousClassement($id)
    {
//        dd($id);
        $this->currentClassement = Classement::find($id);
        $this->sousClassements = $this->currentClassement->sousCLassements;
        $this->depth = 2;
    }

    function setDepth($number)
    {
        $this->reset("currentClassement", "sousClassements");
        $this->depth = $number;

    }

    function setSousDepth($val){
        $this->sousDepth = boolval($val);
    }
}