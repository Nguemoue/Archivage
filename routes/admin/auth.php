<?php


/**
 * for Auth
 */
Route::group(
	[
		"middleware" => ["localizationRedirect", "localize", "localeSessionRedirect", "localeViewPath"],
		'domain' => adminUrl(),
		"as" => "admin.",
		"prefix" => LaravelLocalization::setLocale()

	], function () {

	Route::get("/login", [App\Http\Controllers\Admin\Auth\AuthenticatedSessionController::class, "create"])
		->middleware('guest:' . adminGuard())
		->name("login");

	Route::post("/login", [App\Http\Controllers\Admin\Auth\AuthenticatedSessionController::class, "store"])
		->middleware('guest:' . adminGuard())
		->name("login");

	Route::get('/forgot-password', [App\Http\Controllers\Admin\Auth\PasswordResetLinkController::class, 'create'])
		->middleware('guest:' . adminGuard())
		->name('password.request');

	Route::post('/forgot-password', [App\Http\Controllers\Admin\Auth\PasswordResetLinkController::class, 'store'])
		->middleware('guest:' . adminGuard())
		->name('password.email');

	Route::get('/reset-password/{token}', [App\Http\Controllers\Admin\Auth\NewPasswordController::class, 'create'])
		->middleware('guest:' . adminGuard())
		->name('password.reset');

	Route::post('/reset-password', [App\Http\Controllers\Admin\Auth\NewPasswordController::class, 'store'])
		->middleware('guest:' . adminGuard())
		->name('password.update');
	Route::post("/logout", [App\Http\Controllers\Admin\Auth\AuthenticatedSessionController::class, "destroy"])
		->middleware("auth:".adminGuard())
		->name("logout");


});
/**
 * End for Auth
 */
