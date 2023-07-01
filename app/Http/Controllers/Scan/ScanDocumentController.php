<?php

namespace App\Http\Controllers\Scan;

use App\Http\Controllers\Controller;
use App\Models\TempDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ScanDocumentController extends Controller
{
    function create(){
        return view("scann.documents.create");
    }

    function store(Request $request){
        $validator = Validator::make($request->only('url', 'titre'), [
            'url' => ["required", "file"],
            'titre' => "required|string"
        ], customAttributes: ['url' => "fichier"]);
        $validator->validate();
        // mon repertoire de stockage
        $dir  = now()->format("y_m_d");
        // je stocke mon fichier image
        $doc = TempDocument::query()->create([
            'numero'=>Str::uuid(),
			  "structure_id"=>auth(webGuard())->user()->structure->id,
            'url'=>$request->file('url')->store(TempDocument::DEFAULT_PATH. '/'.$dir)
        ]);

        return redirect()->back()->with("success", "fichier envoyer avec success");
        // je stocke les documents en fonctions de la date du jour
        // TempDocument::
    }
}
