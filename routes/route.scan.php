<?php

use App\Http\Controllers\Scan\ScanDocumentController;
use App\Http\Controllers\Scan\ScanDossierController;
use App\Http\Controllers\ScannController;
use Illuminate\Support\Facades\Route;

Route::group([
	"prefix" => LaravelLocalization::setLocale(),
	'middleware' => ["localeSessionRedirect","localizationRedirect","localeViewPath","permission:".config('perm_names.SCAN_DOC')]
],function() {


	Route::group([

	], function () {
		Route::get("scan", [ScannController::class, "index"])
			->name("scan.index");
		// Route::get("scan/create", ScannGroup::class)->name("scann.create");

		// pour les documents
		Route::get("scan/document/create", [ScanDocumentController::class, "create"])->name('scann.document.create');
		Route::post("scan/document/store", [ScanDocumentController::class, "store"])->name("scann.document.store");
		// pour les dossiers
		Route::get("scan/dossier/create", [ScanDossierController::class, "create"])->name("scann.dossier.create");
		Route::post("scan/dossier/store", [ScanDossierController::class, "store"])->name("scann.dossier.store");

	});
});
