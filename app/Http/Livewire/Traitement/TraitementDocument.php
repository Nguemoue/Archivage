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
	public $props = null;
	public $menuContextuel = '';
	public $document = null;
	public $dossier;
	public $name;
	protected $rules = [
		'titre' => 'required',
		'quantite' => 'required'
	];


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
		#)je stocke mes information en bd
		session()->put("dossier-".$dossierId.".document-".$this->document->id,[

		]);
	}


	public function secondStep(Request $request)
	{

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
