<?php

use App\Http\Controllers\Admin\UserAccountController;
use App\Http\Controllers\UserAccountPermissionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\StructureController as AdminStructureController;

Route::group(
	[
		"middleware" => ["localizationRedirect", "localize", "localeSessionRedirect", "localeViewPath"],
		'domain' => adminUrl(),
		"as" => "admin.",
		"prefix" => LaravelLocalization::setLocale()

	], function () {

	Route::middleware(["auth:admin","passwordChanged:admin"])->group(function(){
		Route::get('/',[\App\Http\Controllers\Admin\AdminHomeController::class,"home"] )->name("home");
		//route pour les comptes utilisateurs
		Route::get("account/user/list",[UserAccountController::class,"index"])->name("user.account.list");
		Route::post("account/user/create",[UserAccountController::class,"store"])->name("user.account.store");
		Route::post("account/user/{userId}/update",[UserAccountController::class,"update"])->name("user.account.update");
		Route::post("account/user/{userId}/delete",[UserAccountController::class,"delete"])->name("user.account.delete");
		//pour les permissions des comptes
		Route::post("user/{userId}/permission/update",[UserAccountPermissionController::class,"update"])->name("user.permission.update");
		//pour les structures
Route::middleware(['permission:'.config('perm_names.MAN_STRUCTURE')])->group(function (){
	Route::get("structure/list",[AdminStructureController::class,"index"])->name("structure.list");
	Route::post("structure/store",[AdminStructureController::class,"store"])->name("structure.store");
	Route::post("structure/{structureId}/update",[AdminStructureController::class,"update"])->name("structure.update");
	Route::post("structure/{structureId}/delete",[AdminStructureController::class,"delete"])->name("structure.delete");
});
	});

});
require __DIR__.'/auth.php';
require __DIR__.'/change_password.php';
