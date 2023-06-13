<?php

use App\Http\Controllers\StatistiqueController;
use Illuminate\Support\Facades\Route as Route;
Route::group([
	"prefix" => LaravelLocalization::setLocale(),
	'middleware' => ["localeSessionRedirect","localizationRedirect","localeViewPath"]
],function() {

	Route::get("/statistique/index", [StatistiqueController::class, "index"])->name("statistique.index");
	Route::post("/statistique/home", [StatistiqueController::class, "home"])->name("statistique.home");
	Route::post("/statistique/{sousType}/pdfDownload", [StatistiqueController::class, "filePdf"])->name("statistique.filePdf");
	Route::get("/statistique/{sousType}/pdfFile", [StatistiqueController::class, "file"])->name("statistique.file");
});
