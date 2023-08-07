<?php


namespace App\Services;

use App\Contracts\Traitement\TraitementDocumentContract;
use App\Models\TempDocument;
use hisorange\BrowserDetect\Exceptions\Exception;
use Illuminate\Support\Facades\Session;

class SessionTraitementDocument implements TraitementDocumentContract
{


	public ?int $folderId = null;

	public function updateDocument(int $fileId, array|\App\Models\TempDocument $newData)
	{
		if($this->folderId==null){
			throw new Exception("Le Document doit etre attâcher a un dossier");
		}
		if (!$this->hasDocument($fileId)) {
			$this->addDocument($newData);
		}

		$oldData = $this->getDocument($fileId);

		foreach ($newData as $key => $val) {
			$oldData[$key] = $val;
		}
		Session::put($this->getDocumentKey($this->folderId, $fileId), $oldData);
	}

	public function hasDocument(int $fileId): bool
	{
		return $this->getDocument($fileId) != null;
	}

	public function getDocument(int $fileId)
	{
		if($this->folderId==null){
			throw new Exception("Le Document doit etre attâcher a un dossier");
		}
		return Session::get($this->getDocumentKey($this->folderId, $fileId), null);
	}

	public function addDocument(array|\App\Models\TempDocument $fileData)
	{

		if ($fileData instanceof TempDocument) {
			Session::put($this->getDocumentKey($this->folderId, $fileData->id), $fileData->toArray());
		} elseif (is_array($fileData)) {
			Session::put($this->getDocumentKey($this->folderId, $fileData['id']), $fileData);
		}
	}

	/**
	 * @param int $docId
	 * @param int $documentId
	 * @return mixed
	 */
	public function getDocumentKey(int $docId, int $documentId)
	{
		return prefixDossier() . $docId . "." . prefixDocument() . $documentId;
	}

	public function deleteDocument(int $fileId)
	{
		if($this->folderId==null){
			throw new Exception("Le Document doit etre attâcher a un dossier");
		}
		Session::forget($this->getDocumentKey($this->folderId,$fileId));
	}

	public function attachToFolder(int $folderId): TraitementDocumentContract
	{
		$this->folderId = $folderId;
		return $this;
	}

	/**
	 * @param int $docId
	 * @return mixed
	 */
	public function getDossierKey(int $docId)
	{
		return prefixDossier() . $docId;
	}


	public function getAll(int $dossierId = null):array
	{
		$dossierId = $dossierId??$this->folderId;
		return Session::get($this->getDossierKey($dossierId));
	}

	public function deleteAll(int $dossierId = null):void
	{
		$dossierId = $dossierId??$this->folderId;
		Session::forget($this->getDossierKey($dossierId));
	}
}
