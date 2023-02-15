<?php

use App\Http\Controllers\Traitement\TraitementDocument;
use App\Http\Controllers\Traitement\TraitementDossier;
use App\Http\Controllers\Traitement\TraitementController;
use Illuminate\Support\Facades\Route;

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

        // route pour les dossiers
        Route::get("dossier", [TraitementDossier::class, "index"])->name("dossier.index");
        Route::get("dossier/{id}", [TraitementDossier::class, "show"])->name("dossier.show");

        Route::get("document/{id}/sucess",[TraitementDocument::class,"success"])->name("document.finish");
        Route::post("document/{id}/updateData",[TraitementDocument::class,"updateData"])->name("document.updateData");
    }
);