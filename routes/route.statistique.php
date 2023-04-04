<?php

use App\Http\Controllers\StatistiqueController;
use Illuminate\Support\Facades\Route as Route;

Route::get("/statistique/index", [StatistiqueController::class, "index"])->name("statistique.index");
Route::post("/statistique/home", [StatistiqueController::class, "home"])->name("statistique.home");