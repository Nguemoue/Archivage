<?php

namespace App\Http\Controllers\Traitement;

use App\Http\Controllers\Controller;
use App\Models\TempDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class TraitementDocument extends Controller
{
    function show($id){
 		 $document = TempDocument::query()->findOrFail($id);
		 $dossierId = $document->tempDossiers->first()->id;
		 // je demarre ma session sur le dossier contenant se dernier
        session()->put("dossier-"."$dossierId",
			  array_merge(session()->get("dossier-".$dossierId,[]),[
        		"document-"."$document->id" => $this->getDefaultIntitData()
		  ]));
        return view("traitement.documents.show",compact('document'));
    }

    private function getDefaultIntitData(){
    	return [
    		"titre"=>null,
			"updated_at"=>now(),
			"created_at"=>now(),
			"data"=>[

			]
		];
	 }


}



