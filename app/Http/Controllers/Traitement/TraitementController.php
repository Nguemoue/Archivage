<?php

namespace App\Http\Controllers\Traitement;

use App\Http\Controllers\Controller;
use App\Models\TempDocument;
use App\Models\TempDossier;
use Illuminate\Http\Request;

class TraitementController extends Controller
{
    function index(){
        // je selectionne tous mes documents
        $temp_documents = TempDocument::query()->paginate(10);
        $temp_dossiers = TempDossier::query()->paginate(10);
        return view("traitement.index",compact('temp_documents','temp_dossiers'));

    }
}
