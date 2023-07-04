<?php


namespace App\Contracts\Traitement;



use App\Models\TempDocument;

interface TraitementDocumentContract
{
	public function addDocument(array | TempDocument $fileData);

	public function getDocument(int $fileId);

	public function updateDocument(int $fileId, array| TempDocument $newData);

	public function deleteDocument(int $fileId);

	public function attachToFolder(int $folderId): self;

	public function hasDocument(int $fileId):bool;

	public function getDossierKey(int $docId);

	public function getDocumentKey(int $docId,int $documentId);

	public function getAll(int $dossierId = null):array;

	public function deleteAll(int $dossierId = null):void;
}
