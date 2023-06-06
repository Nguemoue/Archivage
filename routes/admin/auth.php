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

	Route::get('/forgot-password', [App\Http\Controllers\Admin\Auth\PasswordResetLinkController::class, 'create'])
		->middleware('guest:' . config('misc.guard.admin'))
		->name('password.request');

	Route::post('/forgot-password', [App\Http\Controllers\Admin\Auth\PasswordResetLinkController::class, 'store'])
		->middleware('guest:' . config('misc.guard.admin'))
		->name('password.email');

	Route::get('/reset-password/{token}', [App\Http\Controllers\Admin\Auth\NewPasswordController::class, 'create'])
		->middleware('guest:' . config('misc.guard.admin'))
		->name('password.reset');

	Route::post('/reset-password', [App\Http\Controllers\Admin\Auth\NewPasswordController::class, 'store'])
		->middleware('guest:' . config('misc.guard.admin'))
		->name('password.update');

});
/**
 * End for Auth
 */
