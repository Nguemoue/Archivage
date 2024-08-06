<?php

namespace App\Livewire\Traitement;

use App\Models\Field;
use App\Models\SousTypeDocument;
use App\Models\TempDocument;
use App\Models\TypeDocument;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Livewire\Component;
use TraitementProcessor;

class TraitementDocument extends Component
{

	public TempDocument $tempDocument ;
	public int $step = 1;

	#[Validate('required|string')]
	public ?string $title = null;
	public ?int $typeDocumentId = null;
	public ?int $subTypeDocumentId = null;

	//other attributes
	public array $fieldValues = [];
	public string $stepName;

	/**
	 * Lorsqu'on valide notre premiere tape de traitement de fichiers.
	 * Je stocke mes donnes en sessions
	 */
	public function firstStep(): void
	{
		//second step
		$this->configureStepTo(2);
		foreach ($this->documentFields as $field) {
			$this->fieldValues[$field->id] = '';
		}
	}

	private function configureStepTo(int $step): void
	{
		$stepNames = [1 => "Configuration du dossier", 2 => "Remplissage des champs contextuelles", 3 => "Finalisation"];
		$this->step = $step;
		$this->stepName = $stepNames[$step];
	}

	public function render(): View
	{
		return view('livewire.traitement.traitement-document');
	}

	public function prev(): void
	{
		$this->configureStepTo(($this->step-1)?:1);
	}

	#[Computed]
	public function subTypeDocuments(): Collection
	{
		if ($this->typeDocumentId === null) {
			return collect();
		}
		return SousTypeDocument::query()->whereTypeDocumentId($this->typeDocumentId)->get();
	}

	#[Computed]
	public function documentFields(): Collection
	{
		if ($this->subTypeDocumentId === null) {
			return collect();
		}
		return Field::query()->where("sous_type_document_id", $this->subTypeDocumentId)->get();

	}

	#[Computed]
	public function contextualMenu(): string
	{
		if ($this->subTypeDocumentId === null) {
			return '';
		}
		return SousTypeDocument::find($this->subTypeDocumentId)->nom;
	}
	#[Computed]
	public function documentTypes():Collection
	{
		return TypeDocument::query()->get();
	}

	public function mount(): void
	{
		$this->title = (string) $this->tempDocument->titre;
		$this->configureStepTo(1);
	}



	public function getSousTypeNom($id): Collection
	{
		return SousTypeDocument::query()->where("id", $id)
			->first()?->pluck("nom");
	}

	public function saveDocumentField(): void
	{
		$this->configureStepTo(3);
	}

	public function finishTreatment(): void
	{
		$fields = array_map(fn($item)=>['content'=>$item],$this->fieldValues);
		$this->tempDocument->update([
			'titre' => $this->title,
			'status' => config('traitement.terminer'),
			'sous_type_document_id'=>$this->subTypeDocumentId
		]);
		//if the number of temp_element are finish
		$tempDossier = $this->tempDocument->tempDossier;
		$tempDocumentCount =$tempDossier->tempDocuments()->count();
		$activeTempDocuments = $tempDossier->tempDocuments()->where('status',config('traitement.terminer'))->count();
		if($tempDocumentCount === $activeTempDocuments){
			$tempDossier->update([
				'status' => config('traitement.terminer')
			]);
		}
		//save temp fields
		$this->tempDocument->fields()->sync($fields);
		session()->flash("success","Document traiter avec sucesss");
		$this->redirectRoute("traitement.dossier.show",[$this->tempDocument->temp_dossier_id]);

	}

}
