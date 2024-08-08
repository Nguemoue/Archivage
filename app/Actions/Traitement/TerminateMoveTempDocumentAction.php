<?php

namespace App\Actions\Traitement;

use App\Models\Document;
use App\Models\Dossier;
use App\Models\TempDossier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class TerminateMoveTempDocumentAction
{
	public function handle(Request $request, int $tempDossierId):bool
	{
		$user = $request->user('web');
		$structure = $user->structure;
		$method = $request->integer("copy") === 1 ? "copy" : "move";

		$tempDossier = TempDossier::query()->find($tempDossierId);
		abort_if($tempDossier === null, new Response("model non trouve", 404));
		$tempDocuments = $tempDossier->tempDocuments;
		return \DB::transaction(function () use ($tempDossier, $user, $tempDocuments, $structure, $method) {
			$dossier = Dossier::create([
				'nom' => sha1($tempDossier->nom),
				'numero' => Str::uuid(),
				'is_classed' => 0,
				'user_id' => $user->id,
			]);

			foreach ($tempDocuments as $tempDocument) {
				//je cree un dossiers
				//$storage = Storage::disk("local")->makeDirectory($);
				$document = new Document();
				$document->nom = sha1($tempDocument->titre);
				$document->data = $tempDocument->fields->map(fn($cmp)=>[
					$cmp->label=>$cmp->pivot->content
				]);
				$document->structure_id = $structure->id;
				$document->numero = Str::uuid();
				$document->user_id = $user->id;
				$newPath = $document->nom;
				$newDirectory = Storage::disk("local")->path($newPath);
				$newUrl = $newDirectory. "/" . $document->numero . '.' . $tempDocument->data['extension'];

				if (!Storage::disk('local')->exists($newDirectory)){
					Storage::makeDirectory($newPath);
				}
				if (Storage::disk(tmpDisk())->exists($tempDocument->url)) {
					$oldPath = Storage::disk(tmpDisk())->path($tempDocument->url);
					File::$method($oldPath, $newUrl);
				}
				$document->url = $newUrl;
				$document->sous_type_document_id = $tempDocument->sous_type_document_id;
				$document->dossier_id = $dossier->id;
				$document->save();

			}
			return $dossier !== null;
		});

	}

}
