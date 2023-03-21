<?php

namespace App\Http\Controllers;

use App\Models\Classement;
use App\Models\Dossier;
use Illuminate\Http\Request;

class ClassementController extends Controller
{
    public function index()
    {
        $classements = Classement::query()->withCount("sousClassements")->get();
        return view('classements.index',[
            'classements'=>$classements
        ]);
    }

    public function create()
    {
        return view("classements.create");

    }

    public function store(Request $request)
    {
        //je recupere les donnes
        $request->validate([
            'nom'=>"required|string|unique:classements,nom"
        ]);
        $ordre = Classement::query()->max("ordre");
        $nom = $request->input("nom");
        Classement::query()->create([
            'nom'=>$nom,
            'ordre'=>$ordre+1
        ]);
        return redirect()->back()->with("success","Donnes enregistre avec success !");
    }

    public function show(Classement $classement)
    {
    }

    public function edit(Classement $classement)
    {
        $ordreClassements = Classement::pluck("ordre");
        return view("classements.edit",compact("classement","ordreClassements"));
    }

    public function update(Request $request, Classement $classement)
    {
        $request->validate([
            'nom'=>'required|string',
            'ordre'=>"required|integer"
        ]);
        $elementWithCurrentOrder = Classement::query()->whereOrdre($request->input("ordre"))->first();
        $elementWithCurrentOrder->ordre = $classement->ordre;

        $nom = $classement->nom;
        $classement->nom = $request->input("nom");
        $classement->ordre = $request->input("ordre");
        $classement->save();
        $elementWithCurrentOrder->save();
        return redirect()->back()->with("success","Mise a jour avec success");
    }

    public function destroy(Classement $classement)
    {
        $classement->delete();
        return redirect()->back()->with("success","suppression reussi");
    }

    function  classDossier(Request $request,$dossierId){
        $dossier = Dossier::find($dossierId);
        return view("classements.dossier.index",compact("dossier"));
    }
}