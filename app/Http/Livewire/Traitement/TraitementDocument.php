<?php

namespace App\Http\Livewire\Traitement;

use App\Models\Field;
use App\Models\SousTypeDocument;
use App\Models\TypeDocument;
use Illuminate\Support\Facades\Request;
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

    public $titre = '';
    public $type = [];
    public $typeId = 0;
    public $sousTypeId = '';
    public $soustype = [];
    public $fields = null;
    protected $rules = [
        'titre'=>'required',
        'quantite'=>'required'
    ];
    public $props = null;
    public $menuContextuel = '';
    public function firstStep()
    {
        // dd($this->sousTypeId);
        $this->step = 2;
        $this->fields = Field::query()->where("sous_type_document_id", $this->sousTypeId)->get();
        $this->menuContextuel = SousTypeDocument::query()->find($this->sousTypeId)->nom;
        $arrData = $this->fields->pluck("name")->toArray();
        $finalRules = [];
        // dd($arrData);
        // $this->props = new \stdClass;
        foreach ($arrData as $v) {
            $finalRules += ["$v" => "required"];
            
            // $this->props->$v = "";
        }


        $this->rules = $finalRules; 

    }

    
    public function secondStep(Request $request)
    {
        $d = request()->all();
        dd($this);
        $this->step = 3;

    }

    public function thirdStep()
    {
        // fonction qui effectue le traitement
    }
    public function render()
    {
        return view('livewire.traitement.traitement-document');
    }

    public function prev()
    {
        $this->step = $this->step - 1;
    }
    public function updateSousType()
    {
        $this->soustype = TypeDocument::query()->find($this->typeId)->sousTypes->toArray();
    }

    public function mount()
    {

        $this->type = TypeDocument::query()->get()->toArray();
        $this->soustype = SousTypeDocument::query()->get()->toArray();
        $this->sousTypeId = optional($this->soustype[0])['id'];
    }
    public function getSousTypeNom($id)
    {
        return SousTypeDocument::query()->where("id", $id)->first()->pluck("nom");
    }

    public function tratiter()
    {
        dd("traitement");
    }

}
