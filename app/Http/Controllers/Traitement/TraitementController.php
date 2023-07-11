<?php

namespace App\Http\Controllers\Traitement;

use App\Casts\TraitementCast;
use App\Facades\TraitementDocumentFacade;
use App\Http\Controllers\Controller;
use App\Models\Dossier;
use App\Models\TempDocument;
use App\Models\TempDossier;
use Dotenv\Util\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class TraitementController extends Controller
{
    function index(){

    	 //je recupere tous les dossier traite par ce dernier
		 $user = webAuth()->user();
		 $dossiersNonFini = Dossier::query()->whereUserId($user->id)
			 ->whereIsClassed(false)
			 ->get();
		 if($dossiersNonFini->isNotEmpty()){
			 foreach ($dossiersNonFini as $item){
				 return  redirect()->route('classement.dossier.post',[$item->id]);
			 }
		 }

        $temp_dossiers = TempDossier::query()
			  ->with("tempDocuments")
			  ->withCasts(['status' => TraitementCast::class])
			  ->withCount("tempDocuments")->get()
			  ->each(function ($element){
					$element->size = $element->tempDocuments->reduce(function ($carry,$document){
						return $carry += Storage::disk(tmpDisk())->size($document->url);
					});
					$element->size = megaOctet($element->size);
			  });

        return view("traitement.index",compact('temp_dossiers'));

    }

}
