<?php

use App\Http\Controllers\Api\SousTypeApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/sousType/{id}/fields", [SousTypeApiController::class, "index"])->name("api.soustype.fields");

Route::get("/logo",function (){
	$file = base_path("public/minepat.jpg");
	$f = File::get($file);
	return response($f)->withHeaders(['Content-Type'=>'image/jpg']);
})->name("api.logo");
