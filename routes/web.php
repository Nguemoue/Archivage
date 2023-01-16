<?php

use App\Http\Controllers\FichierDecisionController;
use App\Http\Controllers\Metier\FichierController;
use App\Http\Controllers\PreviewFileController;
use App\Http\Controllers\ScannController;
use App\Http\Controllers\SDDAController;
use App\Http\Livewire\Scann\ScannElement;
use App\Http\Livewire\Scann\ScannGroup;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name("home");

Route::group([

], function () {
    Route::get("sdda", [SDDAController::class, "index"])->name("sdda.index");
    Route::resource("fichiers",FichierController::class);
    Route::resource("fichiers.decision", FichierDecisionController::class);

});

Route::get("/preview-file/{id}", PreviewFileController::class)->name("file.preview");
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
require __DIR__ . '/route.scan.php';
require __DIR__ . '/route.traitement.php';
require __DIR__ . '/type.php';