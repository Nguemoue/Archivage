<?php


namespace App\Contracts\Traitement;



use App\Models\TempDocument;

interface TraitementDocumentContract
{
	public function addDocument(array | TempDocument $tempDocument);

	public function getDocument(int $tempDocumentId);

	public function updateDocument(int $tempDocumentId, array| TempDocument $newData);

	public function deleteDocument(int $temDocumentId);

	public function attachToFolder(int $folderId): self;

	public function hasDocument(int $tempDocumentId):bool;

	public function getDossierKey(int $folderId);

	public function getDocumentKey(int $docId,int $documentId);

	public function getAll(int $folderId = null):array;

	public function deleteAll(int $folderId = null):void;
}
