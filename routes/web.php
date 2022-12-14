<?php

use App\Http\Controllers\FichierDecisionController;
use App\Http\Controllers\Metier\FichierController;
use App\Http\Controllers\SDDAController;
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
    'middleware' => ["auth"]
], function () {
    Route::get("sdda", [SDDAController::class, "index"])->name("sdda.index");
    Route::resource("fichiers",FichierController::class);
    Route::resource("fichiers.decision", FichierDecisionController::class);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
