<?php

namespace App\Livewire;

use App\Models\Classement;
use App\Models\Dossier;
use App\Models\SousClassement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class ClassementView extends Component
{
    public $classements = null;
    public $depth = 1;
    public $dossierId;
    public $sousDepth = false;
    public $currentClassement = null;
    public $currentSousClassement = null;
    public $sousClassements = null;
    public $directories = [];
    public $sousDirectories = [];
	public  $isDownloaded = false;

    public function render()
    {
        return view('livewire.classement-view');
    }

    public function mount()
    {

    }

    function loadSousClassement($id)
    {
        $this->currentClassement = Classement::find($id);
        $this->sousClassements = $this->currentClassement->sousCLassements;
        $this->depth = 2;
    }

    function setDepth($number)
    {
        $this->reset("currentClassement", "currentSousClassement","sousDepth");
        $this->depth = $number;

    }

    function setSousDepth($val, $sousClassementId)
    {
        $this->currentSousClassement = $sousClassementId;
        $sousClassement = SousClassement::query()->find($sousClassementId);
        $this->sousDirectories = $sousClassement->dossiers;
        $dossier = Dossier::query()->find($this->dossierId);
        $this->isDownloaded = $dossier->is_classed;

		 #je charge le contenu du dossiers
        $this->sousDepth = boolval($val);
    }

    function download(Request $request):bool
    {
        $classement = $this->currentClassement;
		  $sousClassement = SousClassement::find($this->currentSousClassement);
        $endUrl = classementPath($classement->nom);

        $dossier = Dossier::find($this->dossierId);
		 	$this->isDownloaded = $dossier->is_classed;

			 #je deplace tous ces documents vers l'emplacement choisis
        $documents = $dossier->documents;
        $documents->each(function ($element) use ($endUrl) {
			  $extension = last(explode(".",$element->url));

            if(File::exists($element->url)){
                $moved = File::move($element->url, $endUrl);
                if ($moved) {
                    $element->url = $endUrl;
                    $element->structure_id = auth(webGuard())->user()->structure->id;
                    $element->save();
                }
            }
        });
        $dossier->sous_classement_id = $this->currentSousClassement;
        $dossier->is_classed = true;
        $dossier->save();
		 session()->flash("success","Enregistre avec success");
		 $this->redirect(route('traitement.index'));
	 }
}
