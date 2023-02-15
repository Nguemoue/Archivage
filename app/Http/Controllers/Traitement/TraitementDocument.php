<?php

namespace App\Http\Controllers\Traitement;

use App\Http\Controllers\Controller;
use App\Models\TempDocument;
use Illuminate\Http\Request;

class TraitementDocument extends Controller
{
    function show($id)
    {
        $document = TempDocument::query()->findOrFail($id);
        $dossierId = $document->tempDossiers->first()->id;
        // je demarre ma session sur le dossier contenant se dernier
        session()->put("dossier-" . "$dossierId",
            array_merge(session()->get("dossier-" . $dossierId, []), [
                "document-" . "$document->id" => $this->getDefaultIntitData()
            ]));
        return view("traitement.documents.show", compact('document'));
    }

    private function getDefaultIntitData()
    {
        return [
            "titre" => null,
            "updated_at" => now(),
            "created_at" => now(),
            "data" => [

            ],
            'status'=>config('traitement.commencer')
        ];
    }

	function updateData($id,Request $request){
        $allData = $request->except("_token");
//        dd($allData);
        $data = json_encode($allData);
        session()->put("dossier-".$allData['dossierId'].'.document-'.$id.".data",$data);
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



