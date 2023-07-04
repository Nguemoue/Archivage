<?php

namespace App\Http\Controllers\Traitement;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Dossier;
use App\Models\DossierDocument;
use App\Models\TempDocument;
use App\Models\TempDossier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Nette\Utils\Json;
use Symfony\Component\HttpFoundation\Response;

class TraitementDossier extends Controller
{
	function show($id)
	{
		$dossier = TempDossier::query()->findOrFail($id);
		$documentId = $dossier->tempDocuments->first()->id;
		$processor = \TraitementProcessor::attachToFolder($dossier->id);
		$processor->updateDocument($documentId, ["titre" => "lucas"]);

		return view("traitement.dossiers.show", compact('dossier'));
	}


	/**
	 * fonction qui effectue le traitement final du dossier
	 * @param $id
	 * @param \Illuminate\Http\Request $request
	 * @throws \Throwable
	 */
	public function finish($id, Request $request)
	{


		$method = "move";
		$method = $request->input("copy") == '1' ? "copy" : $method;
		$tempDossier = TempDossier::query()->find($id);
		abort_if($tempDossier == null, new Response("model non trouve", 404));
		$tempDocuments = $tempDossier->tempDocuments;

		$sessionsDoc = \TraitementProcessor::getAll($tempDossier->id);
		$doc = Dossier::query()->updateOrCreate([
			"nom"=>$tempDossier->nom,
		],[
			"numero"=>Str::uuid()
		]);

		foreach ($sessionsDoc as $key => $item) {
			$tempDocumentKey = Str::after($key,prefixDocument());
			$tmpDoc = TempDocument::find($tempDocumentKey);
			//je cree un dossiers
			$storage = Storage::disk("local")->createDir($doc->nom);
			$document = new Document();
			$document->nom = $item["titre"];
			$document->created_at = $item["created_at"];
			$document->updated_at = $item["updated_at"];
			$document->data = Json::decode($item["data"], true);
			$document->structure_id = auth(webGuard())->user()->structure->id;
			$document->numero = Str::uuid();
			$ext = explode(".", $tmpDoc->url)[1];
			$newUrl = Storage::disk("local")->path($doc->nom . "/" . $document->numero . '.' . $ext);
			if (Storage::disk(tmpDisk())->exists($tmpDoc->url)) {

				File::$method(Storage::disk(tmpDisk())->path($tmpDoc->url), $newUrl);
			}
			$newUrl = str_replace(DIRECTORY_SEPARATOR, "/", $newUrl);
			$document->url = $newUrl;
			$document->sous_type_document_id = $item["sousTypeId"];
			$document->save();
			//je cree le
			$dossierDocument = new DossierDocument();
			$dossierDocument->document_id = $document->id;
			$dossierDocument->dossier_id = $doc->id;
			$dossierDocument->save();
		}

		$tempDossier->tempDocuments()->delete();
		$tempDossier->delete();
		\TraitementProcessor::deleteAll($tempDossier->id);

		return redirect()->route("classement.dossier.post", [$doc->id]);
	}
}
