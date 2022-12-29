<?php

namespace App\Http\Controllers\Scan;

use App\Models\TempDossierDocument;
use Illuminate\Support\Str;
use App\Models\TempDocument;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TempDossier;
use Illuminate\Support\Facades\Validator;

class ScanDossierController extends Controller
{
    function index(){
        return view("scann.dossiers.index");
    }

    function create(){
        return view("scann.dossiers.create");
    }

    function store(Request $request){
        $validator = Validator::make($request->only('titre', 'files'), [
            'files' => ["required"],
            'titre' => "required|string"
        ], customAttributes: ['files' => "les fichiers rattaches"]);
        $validator->validate();
        // mon repertoire de stockage
        $dir  = now()->format("y_m_d");
        // je stocke mon fichier image
        $createdFolder = TempDossier::query()->create([
            'nom'=>$request->input("titre")
        ]);
        // je cree les documents_dossiers qui correspondents
        // je parcours toutes la liste de mes fichiers
        foreach($request->file("files") as   $file){
            // je cree ma source a partir de cette derniers
                // je cree mon document
            $tempDocument = TempDocument::query()->create([
                'url'=>$file->store(TempDocument::DEFAULT_PATH.'/'.$dir),
                'numero'=>Str::uuid()
            ]);
            TempDossierDocument::query()->create([
                'temp_document_id'=>$tempDocument->id,
                'temp_dossier_id'=>$createdFolder->id
            ]);
        }
        return redirect()->back()->with("success", "fichier envoyer avec success");
        // je stocke les documents en fonctions de la date du jour
        // TempDocument::
    }
}
