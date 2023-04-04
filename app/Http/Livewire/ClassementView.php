<?php

namespace App\Http\Livewire;

use App\Models\Classement;
use App\Models\Dossier;
use App\Models\SousClassement;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
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


    public function render()
    {
        return view('livewire.classement-view');
    }

    public function mount()
    {
        $this->classements = Classement::all();
    }

    function loadSousClassement($id)
    {
//        dd($id);
        $this->currentClassement = Classement::find($id);
        $this->sousClassements = $this->currentClassement->sousCLassements;
        $this->depth = 2;
    }

    function setDepth($number)
    {
        $this->reset("currentClassement", "sousClassements");
        $this->depth = $number;

    }

    function setSousDepth($val, $sousClassementId)
    {
        $this->currentSousClassement = $sousClassementId;
        $sousClassement = SousClassement::find($sousClassementId);
        $url = $sousClassement->classement->nom .  "/". $sousClassement->nom;
        $this->sousDirectories = Storage::directories($url);
        $final = [];
        foreach ($this->sousDirectories as $val){
            $final[$val] = Storage::files($val);
        }
        $this->sousDirectories = $final;
        #je charge le contenu du dossiers
        $this->sousDepth = boolval($val);
    }

    function download(Request $request)
    {
        $classement = $this->currentClassement;
        $sousClassement = SousClassement::find($this->currentSousClassement);
        $endUrl = $classement->nom . DIRECTORY_SEPARATOR . $sousClassement->nom;
        $dossier = Dossier::find($this->dossierId);
        #je deplace tous ces documents vers l'emplacement choisis
        $documents = $dossier->documents;
        $documents->each(function ($element) use ($endUrl) {
            $endPart = Arr::last(explode(DIRECTORY_SEPARATOR, $element->url));
            $url = $endUrl . DIRECTORY_SEPARATOR . $endPart;
            #je deplace mon fichier vers ce repertoire
            if(Storage::exists($element->url)){
                $moved = Storage::move($element->url, $url);
                if ($moved) {
                    $element->url = $url;
                    $element->save();
                    session()->flash("enregistre avec success");
                }

            }

        });

    }
}