<?php

use App\Http\Controllers\NavigateController;

Route::group([
	"prefix" => LaravelLocalization::setLocale(),
	'middleware' => ["localeSessionRedirect", "localizationRedirect", "localeViewPath","permission:".config('perm_names.NAV')]
], function () {
	Route::get("/navigate/index", NavigateController::class)->name("navigation.index");
});
