<?php

namespace App\Http\Controllers\Traitement;

use App\Http\Controllers\Controller;
use App\Http\Requests\TraitementDossierRequest;
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
use function Illuminate\Filesystem\join_paths;

class TraitementDossier extends Controller
{
	function show($id)
	{
		$dossier = TempDossier::query()->findOrFail($id);
		return view("traitement.dossiers.show", compact('dossier'));
	}

	public function destroy($id)
	{
		$dossier = TempDossier::query()->findOrFail($id);
		$dossier->tempDocuments()->update(['status' => config('traitement.debuter')]);
		$dossier->status = config('traitement.debuter');
		$dossier->save();
		session()->forget('dossier-' . $id);
		return redirect()->back()->with('success', 'dossier reinitialisation');
	}


	/**
	 * fonction qui effectue le traitement final du dossier
	 * @param $id
	 * @param \Illuminate\Http\Request $request
	 * @throws \Throwable
	 */
	public function finish($id, TraitementDossierRequest $request)
	{
		$structure = auth()->user()->structure;
		$user = webAuth()->user();
		$method = "move";
		$method = $request->input("copy") == '1' ? "copy" : $method;
		$tempDossier = TempDossier::query()->find($id);
		$sessionsDoc = \TraitementProcessor::getAll($tempDossier->id);
		//delete ol directories
		archivage_disk()->deleteDirectory(folderNameForStructure($structure->nom, $tempDossier->nom));
		$doc = Dossier::query()->updateOrCreate([
			'structure_id' => $structure->id,
			"user_id" => $user->id
		], [
			"nom" => $tempDossier->nom,
			"numero" => Str::uuid()
		]);
		archivage_disk()->makeDirectory(folderNameForStructure($structure->nom, $doc->nom));

		foreach ($sessionsDoc as $key => $item){
			\DB::transaction(function () use ($key,$item,$structure,$user,$doc,$method){
				$tempDocumentKey = Str::after($key, prefixDocument());
				$tempDocument = TempDocument::find($tempDocumentKey);
				$document = new Document();
				$document->nom = $item["titre"];
				$document->created_at = $item["created_at"];
				$document->updated_at = $item["updated_at"];
				$document->data = Json::decode($item["data"], true);
				$document->structure_id = $structure->id;
				$document->numero = Str::uuid();
				$document->user_id = $user->id;
				$ext = explode(".", $tempDocument->url)[1];
				$targetUrl = archivage_disk()->path(join(DIRECTORY_SEPARATOR,[folderNameForStructure($structure->nom,$doc->nom), $tempDocument->numero.'.'. $ext]));
				$tmpFileSource = Storage::disk(tmpDisk())->path($tempDocument->url);
				if (Storage::disk(tmpDisk())->exists($tempDocument->url)) {
					File::copy($tmpFileSource,$targetUrl);
				}
				//$newUrl = str_replace(DIRECTORY_SEPARATOR, "/", $newUrl);
				$document->url = $targetUrl;
				$document->sous_type_document_id = $item["sousTypeId"];
				$document->save();
				//je cree le
				$dossierDocument = new DossierDocument();
				$dossierDocument->document_id = $document->id;
				$dossierDocument->dossier_id = $doc->id;
				$dossierDocument->save();
			});

		}

		$tempDossier->tempDocuments()->delete();
		$tempDossier->delete();
		\TraitementProcessor::deleteAll($tempDossier->id);

		return redirect()->route("classement.dossier.post", [$doc->id])->with('success','dossier cree avec succes')->with('info','vous devez maintenant effectuer un classement');
	}
}
