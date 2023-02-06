<?php

namespace App\Http\Controllers\Traitement;

use App\Http\Controllers\Controller;
use App\Models\TempDocument;
use Illuminate\Http\Request;

class TraitementDocument extends Controller
{
    function show($id){
        $document = TempDocument::query()->findOrFail($id);
        $dossierId = $document->tempDossiers->pluck("id")->first();        
        // je demarre ma session sur le dossier contenant se dernier
        session()->put("traitement.document".$document->id,null);
        return view("traitement.documents.show",compact('document'));
    }
}
