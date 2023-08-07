<?php


namespace App\Services;


use App\Contracts\Traitement\TraitementDocumentContract;
use App\Models\TempDocument;
use Exception;
use Illuminate\Support\Facades\Session;

class DatabaseTraitementDocument implements TraitementDocumentContract
{
	public ?int $folderId = null;

	public function addDocument(TempDocument|array $fileData)
	{
		if ($fileData instanceof TempDocument) {
			$fileData->save();
		} elseif (is_array($fileData)) {
			TempDocument::create($fileData);
		}
	}

	public function getDocument(int $fileId)
	{
		if($this->folderId==null){
			throw new Exception("Le Document doit etre attâcher a un dossier");
		}
		return TempDocument::where("id",$fileId)->get();
	}

	/**
	 * @throws \Exception
	 */
	public function updateDocument(int $fileId, TempDocument|array $newData)
	{
		if($this->folderId==null){
			throw new \Exception("Le Document doit etre attâcher a un dossier");
		}
		if (!$this->hasDocument($fileId)) {
			$this->addDocument($newData);
		}

		$oldData = $this->getDocument($fileId);

		foreach ($newData as $key => $val) {
			$oldData[$key] = $val;
		}
		//je met a jour mon document
		if($newData instanceof TempDocument){
			$newData->update(["data"=>$oldData]);
		}else{
			TempDocument::where("data",$newData)->updateOrCreate(["data"=>$newData],[
				"structure_id"=>auth()->user()->structure_id,
				"numero"=>\Str::uuid(),
			]);
		}
	}

	public function deleteDocument(int $fileId)
	{

	}

	public function attachToFolder(int $folderId): TraitementDocumentContract
	{
		// TODO: Implement attachToFolder() method.
	}

	public function hasDocument(int $fileId): bool
	{
		return $this->getDocument($fileId) != null;

	}

	public function getDossierKey(int $docId)
	{

	}

	public function getDocumentKey(int $docId, int $documentId)
	{

	}

	public function getAll(int $dossierId = null): array
	{
		// TODO: Implement getAll() method.
	}

	public function deleteAll(int $dossierId = null): void
	{
		// TODO: Implement deleteAll() method.
	}
}
