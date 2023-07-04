<?php

namespace App\Http\Controllers\Traitement;

use App\Events\FinishedTraitedDocumentEvent;
use App\Http\Controllers\Controller;
use App\Models\Dossier;
use App\Models\TempDocument;
use App\Models\TempDossier;
use Illuminate\Http\Request;

class TraitementDocument extends Controller
{
    function show($id)
    {
        $document = TempDocument::query()->findOrFail($id);
        $dossierId = $document->tempDossiers->first()->id;
		 \TraitementProcessor::attachToFolder($dossierId)->addDocument($document);
        return view("traitement.documents.show", compact('document','dossierId'));
    }

    private function getDefaultIntitData()
    {
        return [
            "titre" => "",
            "updated_at" => now(),
            "created_at" => now(),
            "data" => [
            ],
            'status'=>config('traitement.encours')
        ];
    }

	function updateData($id,Request $request){
    	  $allData = $request->except("_token","dossierId");
//        dd($allData);
        $data = json_encode($allData);
        \TraitementProcessor::attachToFolder($request->input("dossierId"))->updateDocument($id,['data'=>$data]);
      	$document = TempDocument::find($id);
      	$dossier = TempDossier::find($request->input("dossierId"));
      	$document->status = config('traitement.terminer');
      	$document->save();
      	event(new FinishedTraitedDocumentEvent($document));
      	//je recupere le dossiers
		   $tmpDocumentFinshCount = $dossier->tempDocuments()->where("status","=",config("traitement.terminer"))->count();
			$tmpDocuments = $dossier->tempDocuments()->count();
			if($tmpDocuments == $tmpDocumentFinshCount){
				$dossier->status = config("traitement.terminer");
				$dossier->save();
			}

        return response()->json([
            'message'=>"ok",
        ]);
    }

    function success($id){
        $document = TempDocument::find($id);
        $dossier = $document->tempDossiers()->first();
        session()->put("dossier-{$dossier->id}".'.document-'.$document->id.'.status', config('traitement.terminer'));
        //si on est connecte je le notifier
        return redirect()->route("traitement.dossier.show",[$dossier->id])->with("success","Document traiter avec sucesss");
    }
}



