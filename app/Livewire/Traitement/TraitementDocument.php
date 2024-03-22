<?php

namespace App\Livewire\Traitement;

use App\Models\Field;
use App\Models\SousTypeDocument;
use App\Models\TypeDocument;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Livewire\Component;
use TraitementProcessor;

class TraitementDocument extends Component
{

	public $step = 1;

	//wire attributes
	#[Validate('required|string')]
	public string $title;
	public ?int $documentType = null;
	public ?int $documentSubType = null;

	//other attributes
	public Collection $documentTypes;
	public string $documentFieldData = '';
	public $props = null;
	public $menuContextual = '';
	public $document = null;
	public $dossierId;
	public $name;
	public $processor;
	

	protected $listeners = ["updatedData" => "secondStep"];
	public string $stepName;


	/**
	 *  lorsque on valide notre premiere etape de traitement de fichiers
	 * je stocke mes donnes en sessions
	 */
	public function firstStep():void
	{
		// update date for this document
		$documentId = $this->document->id;
		$updatedData = [
			"titre" => $this->title,
			"typeId" => $this->documentType,
			"sousTypeId" => $this->documentSubType
		];
		TraitementProcessor::attachToFolder($this->dossierId)->updateDocument($documentId, $updatedData);
		//second step
		$this->configureStepTo(2);
	}


	public function render():View
	{
		return view('livewire.traitement.traitement-document');
	}

	public function prev():void
	{
		$this->configureStepTo(1);
	}

	#[Computed]
	public function documentSubTypes(): \Illuminate\Support\Collection
	{
		if ($this->documentType == null){
			return collect();
		}
		return SousTypeDocument::query()->whereTypeDocumentId($this->documentType)->get();
	}
	#[Computed]
	public function documentFields()
	{
		if ($this->documentSubType==null){
			return collect();
		}
		return Field::query()->where("sous_type_document_id", $this->documentSubType)->get();
	}
	#[Computed]
	public function contextualMenu():string
	{
		if ($this->documentSubType == null){
			return '';
		}
		return SousTypeDocument::find($this->documentSubType)->nom;
	}

	public function mount():void
	{
		$this->documentTypes = TypeDocument::query()->get();
		$this->configureStepTo(1);
	}


	public function getSousTypeNom($id)
	{
		return SousTypeDocument::query()->where("id", $id)->first()->pluck("nom");
	}

	private function configureStepTo(int $step): void
	{
		$stepNames = [1=>"Configuration du dossier",2=>"Remplissage des champs contextuelles",3=>"Finalisation"];
		$this->step = $step;
		$this->stepName = $stepNames[$step];
	}

	public function saveDocumentField():void
	{
		$this->redirect(route('traitement.document.finish',['id'=>$this->document->id]));
	}

}
