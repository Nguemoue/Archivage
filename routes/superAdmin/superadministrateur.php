<?php

use App\Http\Controllers\SuperAdmin\AdminAccountPermissionController;
use App\Http\Controllers\SuperAdmin\ConnectionController;
use App\Http\Controllers\SuperAdmin\PermissionController;
use App\Http\Controllers\SuperAdmin\AdminAccountController;
use App\Http\Controllers\SuperAdmin\StructureController;
use App\Http\Controllers\SuperAdmin\SuperAdminUserAccountController;
use App\Http\Controllers\UserAccountPermissionController;
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
		Route::get("connection/list",[ConnectionController::class,"index"])->name("connection.index");
		//gestions des comptes admin
		Route::get("account/admin/list",[AdminAccountController::class,"index"])->name("admin.account.list");
		Route::post("account/admin/create",[AdminAccountController::class,"store"])->name("admin.account.store");
		Route::post("account/admin/{adminId}/update",[AdminAccountController::class,"update"])->name("admin.account.update");
		Route::post("account/admin/{adminId}/delete",[AdminAccountController::class,"delete"])->name("admin.account.delete");
		//gestions des comptes utilisateur
		Route::get("account/user/list",[SuperAdminUserAccountController::class,"index"])->name("user.account.list");
		Route::post("account/user/create",[SuperAdminUserAccountController::class,"store"])->name("user.account.store");
		Route::post("account/user/{userId}/update",[SuperAdminUserAccountController::class,"update"])->name("user.account.update");
		Route::post("account/user/{userId}/delete",[SuperAdminUserAccountController::class,"delete"])->name("user.account.delete");
		//pour la gestion des structures
		Route::get("structure/list",[StructureController::class,"index"])->name("structure.list");
		Route::post("structure/store",[StructureController::class,"store"])->name("structure.store");
		Route::post("structure/{structureId}/update",[StructureController::class,"update"])->name("structure.update");
		Route::post("structure/{structureId}/delete",[StructureController::class,"delete"])->name("structure.delete");
		//pour les permissions des comptes
		Route::post("admin/{adminId}/permission/update",[AdminAccountPermissionController::class,"update"])->name("admin.permission.update");
		//pour les permissions des comptes utilisateurs
		Route::post("user/{userId}/permission/update",[UserAccountPermissionController::class,"update"])->name("user.permission.update");
	});


});
require __DIR__ . '/auth.php';
