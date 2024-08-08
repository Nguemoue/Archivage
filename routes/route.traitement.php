<?php

use App\Http\Controllers\Traitement\TraitementController;
use App\Http\Controllers\Traitement\TraitementDocumentController;
use App\Http\Controllers\Traitement\TraitementDossier;
use Illuminate\Support\Facades\Route;

Route::group([
	"prefix" => LaravelLocalization::setLocale(),
	'middleware' => ["localeSessionRedirect", "localizationRedirect", "localeViewPath", "permission:" . config('perm_names.TRAIT_DOC')]
], static function () {

	Route::group(
		[
			'prefix' => "traitement",
			'as' => "traitement."
		],
		static function () {

			Route::get("/", [TraitementController::class, "index"])->name("index");
			// route pour les documents
			Route::get("document", [TraitementDocumentController::class, "index"])->name("document.index");
			Route::get("document/{id}", [TraitementDocumentController::class, "show"])->name("document.show");

			// route pour les dossiers
			Route::get("dossier", [TraitementDossier::class, "index"])
				->name("dossier.index");
			Route::get("dossier/{id}", [TraitementDossier::class, "show"])
				->name("dossier.show")
				->whereNumber("id");
			Route::delete("dossier/{id}", [TraitementDossier::class, "destroy"])
				->name("dossier.destroy")
				->whereNumber("id");

			Route::post("document/{id}/finish", [TraitementDossier::class, "finish"])->name("dossier-traitement.finish");
		}
	);
});
