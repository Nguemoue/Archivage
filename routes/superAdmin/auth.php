<?php

/**
 * for Auth
 */
Route::group([
	"domain" => superAdminUrl(),
	"as" => "superAdmin.",
	"prefix" => LaravelLocalization::setLocale(),
	"middleware" => ["localeViewPath", "localize", "localeSessionRedirect", "localizationRedirect"]
], function () {

	Route::get('/forgot-password', [App\Http\Controllers\SuperAdmin\Auth\PasswordResetLinkController::class, 'create'])
		->middleware('guest:' . config('misc.guard.superAdmin'))
		->name('password.request');

	Route::get("/login", [App\Http\Controllers\SuperAdmin\Auth\AuthenticatedSessionController::class, "create"])
		->middleware(['guest:superAdmin'])
		->name("login");
	Route::post("/login", [App\Http\Controllers\SuperAdmin\Auth\AuthenticatedSessionController::class, "store"])
		->middleware(['guest:superAdmin'])
		->name("login");
	Route::post("/logout", [App\Http\Controllers\SuperAdmin\Auth\AuthenticatedSessionController::class, "destroy"])
		->middleware(['auth:superAdmin'])
		->name("logout");

	Route::post('/forgot-password', [App\Http\Controllers\SuperAdmin\Auth\PasswordResetLinkController::class, 'store'])
		->middleware('guest:' . config('misc.guard.superAdmin'))
		->name('password.email');

	Route::get('/reset-password/{token}', [App\Http\Controllers\SuperAdmin\Auth\NewPasswordController::class, 'create'])
		->middleware('guest:' . config('misc.guard.superAdmin'))
		->name('password.reset');

	Route::post('/reset-password', [App\Http\Controllers\SuperAdmin\Auth\NewPasswordController::class, 'store'])
		->middleware('guest:' . config('misc.guard.superAdmin'))
		->name('password.update');

	/**
	 * End for Auth
	 */

});
