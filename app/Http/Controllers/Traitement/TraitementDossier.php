<?php

namespace App\Http\Controllers\Traitement;

use App\Actions\Traitement\TerminateMoveTempDocumentAction;
use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Dossier;
use App\Models\DossierDocument;
use App\Models\TempDocument;
use App\Models\TempDossier;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Nette\Utils\Json;
use Nette\Utils\JsonException;
use Symfony\Component\HttpFoundation\Response;
use Throwable;
use TraitementProcessor;

class TraitementDossier extends Controller
{
	public function __construct(public TerminateMoveTempDocumentAction $action)
	{
	}

	/**
	 * Show a file shared for a single treatment of temp_documents.
	 * @param int $id id of temp_dossier.
	 * @return View
	 */
	public function show(int $id)
	{
		$tempDossier = TempDossier::with(['tempDocuments'])->findOrFail($id);
		return view("traitement.dossiers.show", [
			'tempDossier' => $tempDossier
		]);
	}


	/**
	 * Fonction qui effectue le traitement final du dossier
	 * @param int $id
	 * @param Request $request
	 * @return RedirectResponse
	 */
	public function finish(Request $request,int $id): RedirectResponse
	{
		$request->validate([
			'copy'=>['nullable','int'],
		]);
		//$tempDossier = TempDossier::find($id);
		$result = $this->action->handle(request: $request,tempDossierId: $id);
		$tempDossier = TempDossier::find($id);
		$dossier  = Dossier::create([
			'nom'=>$tempDossier->nom,
			'is_classed'=>0,
			'user_id'=>auth('web')->id(),
			'structure_id' => auth('web')->user()->structure_id,
			'numero'=>Str::uuid()
		]);
		if ($result) {
			$tempDossier->delete();
		}
		return redirect()->route("classement.dossier.post", [$dossier->id]);
	}
}
