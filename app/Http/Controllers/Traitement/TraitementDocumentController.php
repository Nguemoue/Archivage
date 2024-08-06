<?php

namespace App\Http\Controllers\Traitement;

use App\Events\FinishedTraitedDocumentEvent;
use App\Http\Controllers\Controller;
use App\Models\Dossier;
use App\Models\TempDocument;
use App\Models\TempDossier;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TraitementDocumentController extends Controller
{
	/**
	 * @param int $id id of a specific temp_documents
	 * @return View
	 */
    public function show(int $id):View
    {
        $tempDocument = TempDocument::with('tempDossier')->findOrFail($id);
		  $pending = TempDocument::where('temp_dossier_id',$tempDocument->temp_dossier_id)
			  ->whereNot('status','=',config('traitement.terminer'))->exists();
		  if($pending and $tempDocument->tempDossier->status !== (int)config('traitement.encours')){
			  TempDossier::whereKey($tempDocument->temp_dossier_id)->update([
				  'status'=>config('traitement.encours')
			  ]);
		  }
		  return view("traitement.documents.show",[
			  'tempDocument'=>$tempDocument,
		  ]);
    }


}



