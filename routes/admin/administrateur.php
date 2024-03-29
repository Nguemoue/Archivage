<?php

use App\Http\Controllers\Admin\StructureController as AdminStructureController;
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

	Route::middleware(["auth:admin", "passwordChanged:admin"])->group(function () {
		Route::get('/', [\App\Http\Controllers\Admin\AdminHomeController::class, "home"])->name("home");
		//route pour les comptes utilisateurs
		Route::get("account/user/list", [UserAccountController::class, "index"])->name("user.account.list");
		Route::post("account/user/create", [UserAccountController::class, "store"])
			->middleware(['permission:' . config('perm_names.CREATE_USER')])
			->name("user.account.store");
		Route::post("account/user/{userId}/update", [UserAccountController::class, "update"])
			->middleware(['permission:' . config('perm_names.MAN_USER')])
			->name("user.account.update");
		Route::post("account/user/{userId}/delete", [UserAccountController::class, "delete"])
			->middleware(['permission:' . config('perm_names.MAN_USER')])
			->name("user.account.delete");
		//pour les permissions des comptes
		Route::post("user/{userId}/permission/update", [UserAccountPermissionController::class, "update"])
			->middleware(['permission:' . config('perm_names.MAN_USER')])
			->name("user.permission.update");
		//pour les structures
		Route::middleware(['permission:' . config('perm_names.MAN_STRUCTURE')])->group(function () {
			Route::get("structure/list", [AdminStructureController::class, "index"])->name("structure.list");
			Route::post("structure/store", [AdminStructureController::class, "store"])->name("structure.store");
			Route::post("structure/{structureId}/update", [AdminStructureController::class, "update"])->name("structure.update");
			Route::post("structure/{structureId}/delete", [AdminStructureController::class, "delete"])->name("structure.delete");
		});
		Route::get("structure/navigate/own", [AdminStructureController::class, "navigateOwn"])
			->middleware(['permission:' . config('perm_names.NAV_STRUCTURE')])
			->name("structure.navigate.own");
		Route::get("structure/navigate/other/{structureId}", [AdminStructureController::class, "navigateOther"])
			->middleware(['permission:' . config('perm_names.NAV_STRUCTURE_ALL')])
			->name("structure.navigate.other");
	});

});
require __DIR__ . '/auth.php';
require __DIR__ . '/change_password.php';
