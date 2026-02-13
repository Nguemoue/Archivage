<?php

namespace App\Observers;

use App\Models\Structure;
use League\Flysystem\FilesystemException;

class FolderCreateObserver
{
	/**
	 * @throws FilesystemException
	 */
	public function created(Structure $structure)
	{
		\Storage::disk('archivage')->createDirectory($structure->nom);
	}

	public function deleted(Structure $structure)
	{
		\Storage::disk('archivage')->deleteDirectory($structure->nom);
	}
}
