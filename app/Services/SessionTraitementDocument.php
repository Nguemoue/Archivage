<?php


namespace App\Services;

use App\Contracts\Traitement\TraitementDocumentContract;
use App\Models\TempDocument;
use hisorange\BrowserDetect\Exceptions\Exception;
use Illuminate\Support\Facades\Session;

class SessionTraitementDocument implements TraitementDocumentContract
{


	public ?int $folderId ;

	/**
	 * @throws Exception
	 */
	public function updateDocument(int $tempDocumentId, array|TempDocument $newData): void
	{
		if($this->folderId===null){
			throw new Exception("Document must be attached to a folder");
		}
		if (!$this->hasDocument($tempDocumentId)) {
			$this->addDocument($newData);
		}

		$oldData = $this->getDocument($tempDocumentId);

		foreach ($newData as $key => $val) {
			$oldData[$key] = $val;
		}
		Session::put($this->getDocumentKey($this->folderId, $tempDocumentId), $oldData);
	}

	/**
	 * @throws Exception
	 */
	public function hasDocument(int $tempDocumentId): bool
	{
		return $this->getDocument($tempDocumentId) !== null;
	}

	/**
	 * @throws Exception
	 */
	public function getDocument(int $tempDocumentId)
	{
		if($this->folderId===null){
			throw new Exception("Document must be attached to a file");
		}
		return Session::get($this->getDocumentKey($this->folderId, $tempDocumentId), null);
	}

	public function addDocument(array|TempDocument $tempDocument): void
	{

		if ($tempDocument instanceof TempDocument) {
			Session::put($this->getDocumentKey($this->folderId, $tempDocument->id), $tempDocument->attributesToArray());
		} else {
			Session::put($this->getDocumentKey($this->folderId, $tempDocument['id']), $tempDocument);
		}
	}

	/**
	 * @param int $docId
	 * @param int $documentId
	 * @return string
	 */
	public function getDocumentKey(int $docId, int $documentId): string
	{

		return prefixDossier() . $docId . "." . prefixDocument() . $documentId;
	}

	/**
	 * @throws Exception
	 */
	public function deleteDocument(int $temDocumentId): void
	{
		if($this->folderId===null){
			throw new Exception("The Document must be attached to a folder");
		}
		Session::forget($this->getDocumentKey($this->folderId,$temDocumentId));
	}

	public function attachToFolder(int $folderId): TraitementDocumentContract
	{
		$this->folderId = $folderId;
		return $this;
	}

	/**
	 * @param int $folderId
	 * @return string
	 */
	public function getDossierKey(int $folderId): string
	{
		return prefixDossier() . $folderId;
	}


	public function getAll(int $folderId = null):array
	{
		$folderId = $folderId??$this->folderId;
		return Session::get($this->getDossierKey($folderId));
	}

	public function deleteAll(int $folderId = null):void
	{
		$folderId = $folderId??$this->folderId;
		Session::forget($this->getDossierKey($folderId));
	}
}
