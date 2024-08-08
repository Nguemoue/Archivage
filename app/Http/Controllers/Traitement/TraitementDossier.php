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
		$authUser = $request->user('web');
		//$tempDossier = TempDossier::find($id);
		//$result = $this->action->handle(request: $request,tempDossierId: $id);
		$tempDossier = TempDossier::find($id);
		$dossier = \DB::transaction(function () use ($tempDossier,$authUser){
			$dossier = Dossier::create([
				'nom'=>$tempDossier->nom,
				'numero'=>uniqid('', true),
				'user_id'=>$authUser->id,
				'structure_id'=>$authUser->structure_id,
				'is_classed'=>false,
				'sous_classement_id'=>null
			]);
			foreach ($tempDossier->tempDocuments as $tempDocument){
				$document = $dossier->documents()->create([
					'nom' => $tempDocument->titre,
					'numero' => $tempDocument->numero,
					'structure_id' => $tempDocument->structure_id,
					'url' => $tempDocument->url,
					'data' => $tempDocument->data,
					'sous_type_document_id' => $tempDocument->sous_type_document_id,
					'user_id' => $authUser->id,
				]);
				$document->fields()->sync(
					$tempDocument->tempDocumentFields
						->pluck('content','field_id')
						->map(fn($item)=>['content'=>$item])
						->toArray()
				);
			}

			$tempDossier->delete();
			return $dossier;
		});

		return redirect()->route("classement.dossier.post", [$dossier->id]);
	}

	public function destroy()
	{
		return redirect()->back();
	}
}
