<?php

namespace App\Livewire;

use App\Models\Classement;
use App\Models\Dossier;
use App\Models\SousClassement;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class NavigationClassement extends Component
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
        return view('livewire.navigation-classement');
    }

    public function mount()
    {
    	$structure = webAuth()->user()->structure;
    	//$this->classements = Classement::query()->where('structure_id','=',$structure->id);
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
//        $final = collect([]);
//        foreach ($this->sousDirectories as $val){
//            $item = new stdClass;
//            $tempFiles = Storage::files($val);
//            $item->url = [];
//            foreach($tempFiles as $file){
//                $finalTemFiles = new stdClass;
//                $finalTemFiles->url = $file;
//                $file = str_replace(DIRECTORY_SEPARATOR,'/',$file);
//                $doc = Document::query()->where("url","like",$file)->first();
//                $finalTemFiles->key = Str::uuid();
//                $finalTemFiles->nom = $doc->nom??$file;
//                $finalTemFiles->extension = Arr::last(explode('.',$file));
//                if(in_array($finalTemFiles->extension, ['jpg','jpeg','png'])){
//                    $finalTemFiles->extension ='image';
//                }
//                $item->url[] = $finalTemFiles;
//            }
//            $item->count = count($item->url);
//            $item->key = Str::uuid();
//            $item->nom = Arr::last(explode('/',$val));
//            $final->put($val,$item);
//        }
//        $this->sousDirectories = $final;
        #je charge le contenu du dossiers
        $this->sousDepth = boolval($first);
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
