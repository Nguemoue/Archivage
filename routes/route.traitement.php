<?php

use App\Http\Controllers\Traitement\TraitementDocument;
use App\Http\Controllers\Traitement\TraitementDossier;
use App\Http\Controllers\Traitement\TraitementController;
use Illuminate\Support\Facades\Route;
Route::group([
	"prefix" => LaravelLocalization::setLocale(),
	'middleware' => ["localeSessionRedirect","localizationRedirect","localeViewPath","permission:".config('perm_names.TRAIT_DOC')]
],function() {


	Route::group(
		[
			'prefix' => "traitement",
			'as' => "traitement."
		],
		function () {

			Route::get("/", [TraitementController::class, "index"])->name("index");
			// route pour les documents
			Route::get("document", [TraitementDocument::class, "index"])->name("document.index");
			Route::get("document/{id}", [TraitementDocument::class, "show"])->name("document.show");
			//reset process for one document
			Route::post("document/{id}/destroy", [TraitementDocument::class, "destroy"])->name("document.destroy");

			// route pour les dossiers
			Route::get("dossier", [TraitementDossier::class, "index"])->name("dossier.index");
			Route::get("dossier/{id}", [TraitementDossier::class, "show"])->name("dossier.show")->whereNumber("id");
			Route::post("dossier/{id}/destroy", [TraitementDossier::class, "destroy"])->name("dossier.destroy")->whereNumber("id");

			// finish document process
			Route::get("document/{id}/sucess", [TraitementDocument::class, "success"])->name("document.finish");
			//update documents fields to a document
			Route::post("document/{id}/updateData", [TraitementDocument::class, "updateData"])->name("document.updateData");
			// finish a process for one document
			Route::post("document/{id}/finish", [TraitementDossier::class, "finish"])->name("dossier-traitement.finish");
		}
	);
});
