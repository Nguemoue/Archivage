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
		 $user = auth()->user();
		 $dossiersNonFini = Dossier::query()->whereUserId($user->id)
			 ->whereIsClassed(false)
			 ->get();

		 if($dossiersNonFini->isNotEmpty()  and config('setup.always_class_after_process')){
			 foreach ($dossiersNonFini as $item){
				 return  redirect()->route('classement.dossier.post',[$item->id]);
			 }
		 }

        $temp_dossiers = TempDossier::query()
			  ->with("tempDocuments",'tempDocuments.media')
			  ->withCasts(['status' => TraitementCast::class])
			  ->withCount("tempDocuments")->get();
        return view("traitement.index",compact('temp_dossiers'));

    }

}
