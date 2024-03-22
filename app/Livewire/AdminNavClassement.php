<?php

namespace App\Livewire;

use App\Models\Classement;
use App\Models\SousClassement;
use Livewire\Component;

class AdminNavClassement extends Component
{
	public $classements;

	public $depth = 1;
	public $dossierId;
	public $sousDepth = false;
	public $currentClassement = null;
	public $currentSousClassement = null;
	public $sousClassements = null;
	public $directories = [];
	public $sousDirectories = [];

	public function render()
	{
		return view('livewire.admin-nav-classement');
	}

	public function mount()
	{
		$structure = adminAuth()->user()->structure;
	}

	function loadSousClassement($id)
	{
		$this->currentClassement = Classement::query()->with('sousCLassements')->find($id);
		$this->sousClassements = $this->currentClassement->sousCLassements;
		$this->depth = 2;
	}

	function setDepth($number)
	{
		$this->reset( "sousClassements","sousDepth","currentSousClassement");
		$this->depth = $number;

	}

	function setSousDepth($first, $sousClassementId){

		$this->currentSousClassement = $sousClassementId;
		$this->currentSousClassement = SousClassement::find($sousClassementId);
		$url = $this->currentClassement->nom .DIRECTORY_SEPARATOR. $this->currentSousClassement->nom;

		$this->sousDirectories = $this->currentSousClassement->dossiers;
		$this->sousDepth = boolval($first);
	}


}
