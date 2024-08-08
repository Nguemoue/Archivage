<?php

namespace App\Actions\Scan;

use App\Http\Requests\Scan\ScanFolderStoreRequest;
use App\Models\TempDocument;
use App\Models\TempDossier;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * Gere le traitement des fichiers apres le scan
 */
class ScanFolderStoreAction
{
	public function handle(ScanFolderStoreRequest $request):void
	{
		// je stocke mon fichier image
		$files = $request->file('files');
		//
		if (!is_array($files)) {
			$files = [$files];
		}
		$authenticatedUser = $request->user('web');
		DB::transaction(static function () use ($request,$files,$authenticatedUser){
			if ($request->boolean('existing_folder')){
				$tempDossier = TempDossier::find($request->integer('title'));
			}else{
				$tempDossier = TempDossier::create([
					'nom' => $request->validated("title"),
					"structure_id" => $authenticatedUser->structure_id,
					'user_id' => $authenticatedUser->id
				]);
			}

			foreach ($files as $file) {
				  TempDocument::create([
					'url' => $file->storePublicly(
						path: str($request->validated('title'))
							->slug("_")
							->prepend(TempDocument::DEFAULT_PATH."/"),
						options:["disk" => tmpDisk()]
					),
					'numero' => Str::uuid(),
					'data' => [
						'size'=>$file->getSize(),
						'owner'=>$file->getOwner(),
						'original_filename'=>$file->getClientOriginalName(),
						'extension'=>$file->getClientOriginalExtension()
					],
					'user_id' => $authenticatedUser->id,
					"structure_id" => $authenticatedUser->structure_id,
					'temp_dossier_id'=>$tempDossier->id
				]);

			}
		});
	}
}
