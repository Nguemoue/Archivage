<?php


namespace App\Facades;


use App\Contracts\Traitement\TraitementDocumentContract;
use Illuminate\Support\Facades\Facade;

class TraitementDocumentFacade extends Facade
{

	protected static function getFacadeAccessor()
	{
		return TraitementDocumentContract::class;
	}
}
