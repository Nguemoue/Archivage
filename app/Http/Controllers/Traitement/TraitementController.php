<?php

namespace App\Http\Controllers\Traitement;

use App\Facades\TraitementDocumentFacade;
use App\Http\Controllers\Controller;
use App\Models\TempDocument;
use App\Models\TempDossier;
use Dotenv\Util\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class TraitementController extends Controller
{
    function index(){

        $temp_dossiers = TempDossier::query()->with("tempDocuments")
			  ->withCount("tempDocuments")->get()->each(function ($element){
					$element->size = $element->tempDocuments->reduce(function ($carry,$document){
						return $carry += Storage::disk(tmpDisk())->size($document->url);
					});
					$element->size = megaOctet($element->size);
			  });


        return view("traitement.index",compact('temp_dossiers'));

    }

}
