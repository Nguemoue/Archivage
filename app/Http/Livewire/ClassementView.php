<?php

namespace App\Http\Livewire;

use App\Models\Classement;
use App\Models\Dossier;
use App\Models\SousClassement;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
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
        $this->classements = Classement::query()->get();
        //je verifie si mes ordre de classent correspondent
		 	foreach ($this->classements as $classement){
		 		if(!Storage::disk("local")->exists($classement->nom)){
		 			Storage::disk("local")->createDir($classement->nom);
				}
				//je construit mes sous classements si il n'existe pas
				if($classement->sousCLassements){
					foreach ($classement->sousCLassements as $c){
						if(!Storage::disk("local")->exists($classement->nom.DIRECTORY_SEPARATOR.$c->nom)){
							Storage::disk("local")->createDir($classement->nom.DIRECTORY_SEPARATOR.$c->nom);
						}
					}
				}
			}



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

    function download(Request $request)
    {
        $classement = $this->currentClassement;
        $sousClassement = SousClassement::find($this->currentSousClassement);

        $endUrl = Storage::disk("local")
			  ->path($classement->nom . DIRECTORY_SEPARATOR . $sousClassement->nom);
        $dossier = Dossier::find($this->dossierId);
		 $this->isDownloaded = $dossier->is_classed;
		 	#je deplace tous ces documents vers l'emplacement choisis
        $documents = $dossier->documents;
        $documents->each(function ($element) use ($endUrl) {
        		$extension = last(explode(".",$element->url));
			  $endUrl.=DIRECTORY_SEPARATOR.$element->nom.".".$extension;
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
	 }
}
