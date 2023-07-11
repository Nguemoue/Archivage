<?php

use App\Http\Controllers\Traitement\TraitementDocument;
use App\Http\Controllers\Traitement\TraitementDossier;
use App\Http\Controllers\Traitement\TraitementController;
use Illuminate\Support\Facades\Route;

Route::group([
	"prefix" => LaravelLocalization::setLocale(),
	'middleware' => ["localeSessionRedirect","localizationRedirect","localeViewPath",'auth:web']
],function() {


	Route::resource("classement", \App\Http\Controllers\ClassementController::class);
	Route::group(
		[
			'prefix' => "classement",
			'as' => "classement."
		],
		function () {
			Route::get("dossier", [\App\Http\Controllers\ClassementController::class, "index"])->name("dossier.index");
			Route::get("dossier/{dossierId}", [\App\Http\Controllers\ClassementController::class, "classDossier"])
				->name("dossier.post")
				->whereNumber("dossierId");
		}
	);

	Route::get("sousClassements/all", [\App\Http\Controllers\SousClassementController::class, "all"])->name("sousClassement.all");
// pour le sousclassement
	Route::resource("classement.sousclassement", \App\Http\Controllers\SousClassementController::class);
});
