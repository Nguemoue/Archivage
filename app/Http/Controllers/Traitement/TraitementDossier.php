<?php

namespace App\Http\Controllers\Traitement;

use App\Http\Controllers\Controller;
use App\Models\TempDossier;
use Illuminate\Http\Request;

class TraitementDossier extends Controller
{
    function show($id)
    {
        $dossier = TempDossier::query()->findOrFail($id);
        return view("traitement.dossiers.show", compact('dossier'));
    }
}
