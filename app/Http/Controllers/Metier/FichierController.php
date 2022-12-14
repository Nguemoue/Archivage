<?php

namespace App\Http\Controllers\Metier;

use App\Http\Controllers\Controller;
use App\Models\DecisionFichier;
use App\Models\Fichier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FichierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $fichiers = Fichier::all();
        return view("fichiers.index", compact("fichiers"));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view("fichiers.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $dossierName = "decisions";
        $request->validate([
            'nom'=>"required|string",
            "fichier"=>"required|file"
        ]);
        //je verifie si il y'a de decusuib
        $decision = $request->boolean("decision");
        // je stocke mon fichier
        $nom = $request->file("fichier")->store($dossierName);
        // j'enregistre mon fichier
        $fichierCreer = Fichier::query()->create([
            'numero'=>Str::uuid(),
            'nom'=>$request->nom,
            'url'=>$nom
        ]);

        // si ma decision est defini je creer mon code d'accees
        if($decision){
            DecisionFichier::query()->create([
                'code'=> $request->decision_code,
                'nature'=>$request->decision_nature,
                'fichier_id'=>$fichierCreer->id
            ]);
        }

        return redirect()->back()->with("success", "fichier creer avec success !");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
