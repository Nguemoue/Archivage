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
    public function index(Request $request){

		 $tempDossiers = TempDossier::query()
			  ->with("tempDocuments")
			  ->withCasts(['status' => TraitementCast::class])
			  ->withCount("tempDocuments")->get();

        return view("traitement.index",[
			  'tempDossiers' => $tempDossiers
		  ]);

    }

}
