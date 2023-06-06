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
