<?php

use App\Http\Controllers\Admin\UserAccountController;
use App\Http\Controllers\UserAccountPermissionController;
use Illuminate\Support\Facades\Route;

Route::group(
	[
		"middleware" => ["localizationRedirect", "localize", "localeSessionRedirect", "localeViewPath"],
		'domain' => adminUrl(),
		"as" => "admin.",
		"prefix" => LaravelLocalization::setLocale()

	], function () {

	Route::middleware(["auth:admin"])->group(function(){
		Route::view('/', "admin.index")->name("home");
		//route pour les comptes utilisateurs
		Route::get("account/user/list",[UserAccountController::class,"index"])->name("user.account.list");
		Route::post("account/user/create",[UserAccountController::class,"store"])->name("user.account.store");
		Route::post("account/user/{userId}/update",[UserAccountController::class,"update"])->name("user.account.update");
		Route::post("account/user/{userId}/delete",[UserAccountController::class,"delete"])->name("user.account.delete");
		//pour les permissions des comptes
		Route::post("user/{userId}/permission/update",[UserAccountPermissionController::class,"update"])->name("user.permission.update");
	});

	Route::middleware(["guest:admin"])->group(function () {
		/**
		 * Route pour les page de connexions et autres
		 */
		Route::get("/login", [App\Http\Controllers\Admin\Auth\AuthenticatedSessionController::class, "create"])->name("login");
		Route::post("/login", [App\Http\Controllers\Admin\Auth\AuthenticatedSessionController::class, "store"])->name("login");
		Route::post("/logout", [App\Http\Controllers\Admin\Auth\AuthenticatedSessionController::class, "destroy"])->name("logout");
	});


});
require __DIR__.'/auth.php';
