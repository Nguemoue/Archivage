<?php

namespace App\Http\Livewire\Traitement;

use App\Models\Field;
use App\Models\SousTypeDocument;
use App\Models\TypeDocument;
use Livewire\Component;

class TraitementDocument extends Component
{

	public $step = 1;

	public $titre = '';
	public $type = [];
	public $typeId = 0;
	public $sousTypeId = 0;
	public $soustype = [];

	public $fields = null;
	public $props = null;
	public $menuContextuel = '';
	public $document = null;
	public $dossierId;
	public $name;
	public $processor;
	protected $rules = [
		'titre' => 'required',
		'quantite' => 'required'
	];

	protected $listeners = ["updatedData" => "secondStep"];


	/**
	 * lorsque on valide notre premiere etape de traitement de fichiers
	 * je stocke mes donnes en sessions
	 */
	public function firstStep()
	{

		//je recupere les champs de menu contextuel correspandant au soustype donnees
		$this->fields = Field::query()->where("sous_type_document_id", $this->sousTypeId)->get();
		//je met a jour mon menu contextuel
		$this->menuContextuel = SousTypeDocument::query()->find($this->sousTypeId)->nom;

		$documentId = $this->document->id;
		$updatedData = [
			"titre" => $this->titre,
			"typeId" => $this->typeId,
			"sousTypeId" => $this->sousTypeId
		];
		\TraitementProcessor::attachToFolder($this->dossierId)
			->updateDocument($documentId, $updatedData);
		$this->step = 2;

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
		$this->soustype = SousTypeDocument::query()->whereTypeDocumentId($this->typeId)
			->get()->toArray();
	}

	public function mount()
	{
		$this->type = TypeDocument::query()->get();
		$this->soustype = SousTypeDocument::query()->get();
	}


	public function getSousTypeNom($id)
	{
		return SousTypeDocument::query()->where("id", $id)->first()->pluck("nom");
	}


}
