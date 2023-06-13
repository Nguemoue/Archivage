<?php

use App\Http\Controllers\SuperAdmin\PermissionController;
use Illuminate\Support\Facades\Route;

Route::group([
	"domain" => superAdminUrl(),
	"as" => "superAdmin.",
	"prefix" => LaravelLocalization::setLocale(),
	"middleware" => ["localeViewPath", "localize", "localeSessionRedirect", "localizationRedirect"]
], function () {

	Route::middleware(["auth:superAdmin"])->group(function () {
		Route::get("/", function () {
			return view("superAdmin.index");
		})->name("home");
		Route::get("permission", [PermissionController::class, "home"])->name("permission.home");
		Route::get("permission/admin", [PermissionController::class, "adminIndex"])->name("permission.admin.index");
		Route::get("permission/web", [PermissionController::class, "webIndex"])->name("permission.web.index");
		Route::get("connection/list",[\App\Http\Controllers\SuperAdmin\ConnectionController::class,"index"])->name("connection.index");
	});

	Route::middleware(["guest:superAdmin"])->group(function () {
		/**
		 * Route pour les page de connexions et autres
		 */
		Route::get("/login", [App\Http\Controllers\SuperAdmin\Auth\AuthenticatedSessionController::class, "create"])->name("login");
		Route::post("/login", [App\Http\Controllers\SuperAdmin\Auth\AuthenticatedSessionController::class, "store"])->name("login");
		Route::post("/logout", [App\Http\Controllers\SuperAdmin\Auth\AuthenticatedSessionController::class, "destroy"])->name("logout");
	});

});
require __DIR__ . '/auth.php';
