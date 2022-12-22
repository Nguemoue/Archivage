<?php

namespace App\Http\Controllers\Traitement;

use App\Http\Controllers\Controller;
use App\Models\TempDocument;
use Illuminate\Http\Request;

class TraitementDocument extends Controller
{
    function show($id){
        $document = TempDocument::query()->findOrFail($id);
        return view("traitement.documents.show",compact('document'));
    }
}
