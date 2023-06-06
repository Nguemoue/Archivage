<?php

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
