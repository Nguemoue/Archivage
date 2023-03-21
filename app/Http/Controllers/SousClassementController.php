<?php

namespace App\Http\Controllers;

use App\Models\Classement;
use App\Models\SousClassement;
use Illuminate\Http\Request;

class SousClassementController extends Controller
{
    function index($classementId){
        $classement = Classement::find($classementId);
       $sousclassements = $classement->sousCLassements;
        return view("sousclassements.index",compact('classement',"sousclassements"));
    }

    function create($classementId){
        $classement = Classement::find($classementId);
        return view("sousclassements.create",compact("classement"));
    }

    function store(Request $request,Classement $classement){
        $request->validate([
            'nom'=>'required|string'
        ]);
        $lastOrdre = SousClassement::query()->max("ordre");
        SousClassement::query()->create([
            'nom'=>$request->input("nom"),
            'ordre'=>$lastOrdre+1,
            'classement_id'=>$classement->id
        ]);
        return redirect()->route("classement.sousclassement.index",[$classement->id])->with("success","Creation avec success");

    }

    function edit(Classement $classement,SousClassement $sousClassement){
        $classements = Classement::without("sousCLassements")->get();
        return view("sousclassements.edit",compact("classement","sousClassement","classements"));
    }

    function all(){
        $classements = Classement::all();
        return view("sousclassements.all",compact("classements"));
    }
}
