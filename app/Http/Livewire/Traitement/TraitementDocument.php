<?php

namespace App\Http\Livewire\Traitement;

use App\Models\Field;
use App\Models\SousTypeDocument;
use App\Models\TypeDocument;
use Illuminate\Support\Str;
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
    public $type = [];
    public $typeId = 0;
    public $sousTypeId = '';
    public $soustype = [];
    public $fields = [];

    public $menuContextuel = '';
    public function firstStep()
    {
        // dd($this->sousTypeId);
        $this->step = 2;
        $this->fields = Field::query()->where("sous_type_document_id", $this->sousTypeId)->get();
        $this->menuContextuel = SousTypeDocument::query()->find($this->sousTypeId)->nom;
    }

    function secondStep()
    {
        $this->step = 3;
    }

    function thirdStep()
    {
        // $this->step = 4;
    }
    public function render()
    {
        return view('livewire.traitement.traitement-document');
    }

    public function prev()
    {
        $this->step = $this->step - 1;
    }
    public function updateSousType(){
        $this->soustype = TypeDocument::query()->find($this->typeId)->sousTypes->toArray();
    }
    
    function mount()
    {
        
        $this->type = TypeDocument::query()->get()->toArray();
        $this->soustype = SousTypeDocument::query()->get()->toArray();
        $this->sousTypeId = optional($this->soustype[0])['id'];
    }

    function getSousTypeNom($id){
        return SousTypeDocument::query()->where("id", $id)->first()->pluck("nom");
    }

}