<?php

namespace App\Http\Controllers\Scan;

use App\Http\Controllers\Controller;
use App\Models\TempDocument;
use App\Models\TempDossier;
use App\Models\TempDossierDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ScanDossierController extends Controller
{
	function index()
	{
		return view("scann.dossiers.index");
	}

	function store(Request $request)
	{
		$validator = Validator::make($request->only('titre', 'files'), [
			'files' => ["required"],
			'titre' => "required|string|unique:temp_dossiers,nom"
		], attributes: ['files' => "les fichiers rattaches"]);
		$validator->validate();

		// mon repertoire de stockage

		\DB::transaction(function () use ($request){
			$createdFolder = TempDossier::query()->create([
				'nom' => $request->input("titre"),
				"structure_id" => auth()->user()->structure->id
			]);
			// je cree les documents_dossiers qui correspondents
			// je parcours toutes la liste de mes fichiers
			foreach ($request->file("files") as $file) {
				// je cree ma source a partir de cette derniers
				// je cree mon document
				$tempDocument = TempDocument::query()->create([
					'url'=>'',
					'numero' => Str::uuid(),
					'data' => $file->getClientOriginalName(),
					"structure_id" => auth()->user()->structure->id
				]);
				$tempDocument->addMedia($file)->usingFileName($file->getFilename())->toMediaCollection(diskName: tmpDisk());
				TempDossierDocument::query()->create([
					'temp_document_id' => $tempDocument->id,
					'temp_dossier_id' => $createdFolder->id
				]);

			}
		});

		return redirect()->back()->with("success", "fichier envoyer avec success");

	}

	function create()
	{
		return view("scann.dossiers.create");
	}
}
