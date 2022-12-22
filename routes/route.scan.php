<?php

use App\Http\Controllers\Scan\ScanDocumentController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Scann\ScannGroup;
use App\Http\Controllers\ScannController;
use App\Http\Controllers\Scan\ScanDossierController;

Route::group([

], function () {
    Route::get("scan", [ScannController::class, "index"])->name("scan.index");
    // Route::get("scan/create", ScannGroup::class)->name("scann.create");

    // pour les documents
    Route::get("scan/document/create", [ScanDocumentController::class, "create"])->name('scann.document.create');
    Route::post("scan/document/store", [ScanDocumentController::class, "store"])->name("scann.document.store");
    // pour les dossiers
    Route::get("scan/dossier/create", [ScanDossierController::class,"create"])->name("scann.dossier.create");
});