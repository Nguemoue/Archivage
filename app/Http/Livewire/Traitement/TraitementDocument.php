<?php

namespace App\Http\Livewire\Traitement;

use App\Models\Field;
use App\Models\SousTypeDocument;
use App\Models\TempDocument;
use App\Models\TypeDocument;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class TraitementDocument extends Component
{

	public $step = 1;

	public $titre = '';
	public $type = [];
	public $typeId = 0;
	public $sousTypeId = '';
	public $soustype = [];
	public $fields = null;
	public $props = null;
	public $menuContextuel = '';
	public $document = null;
	public $dossier;
	public $name;
	protected $rules = [
		'titre' => 'required',
		'quantite' => 'required'
	];

	protected $listeners = ["updatedData"=>"secondStep"];

	/**
	 * lorsque on valide notre premiere etape de traitement de fichiers
	 * je stocke mes donnes en sessions
	 */
	public function firstStep()
	{
		$this->step = 2;
//		je recupere les champs de menu contextuel correspandant au soustype donnees
		$this->fields = Field::query()->where("sous_type_document_id", $this->sousTypeId)->get();
		//je met a jour mon menu contextuel
		$this->menuContextuel = SousTypeDocument::query()->find($this->sousTypeId)->nom;
    		//je stocke les information recupere en sessions
		#1) je recupere l'identifiant du dossier en question
		$dossierId = $this->dossier->id;
		$documentId = $this->document->id;
        session()->put("dossier-".$dossierId.".document-".$documentId.".titre",$this->titre);
        session()->put("dossier-".$dossierId.".document-".$documentId.".type",$this->typeId);
        session()->put("dossier-".$dossierId.".document-".$documentId.".soustype",$this->sousTypeId);
        session()->save();
    }


	public function secondStep()
	{
        $this->step = 3;
	}

	public function thirdStep()
	{

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
	    $this->typeId = $this->type[0]['id'];
		$this->dossier = $this->document->tempDossiers->first();
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
