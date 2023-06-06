<?php

use Illuminate\Support\Facades\Route;

Route::group([
	"domain" => superAdminUrl(),
	"as"=>"superAdmin.",
	"prefix" => LaravelLocalization::setLocale(),
	"middleware" => ["localeViewPath","localize","localeSessionRedirect","localizationRedirect"]
],function () {

	Route::middleware(["auth:superAdmin"])->group(function (){
		Route::get("/",function (){
			return view("superAdmin.index");
		});
	});

	Route::middleware(["guest:superAdmin"])->group(function (){
		/**
		 * Route pour les page de connexions et autres
		 */
		Route::get("/login",[App\Http\Controllers\SuperAdmin\Auth\AuthenticatedSessionController::class,"create"])->name("login");
		Route::post("/login",[App\Http\Controllers\SuperAdmin\Auth\AuthenticatedSessionController::class,"store"])->name("login");
	});

});
require __DIR__.'/auth.php';
