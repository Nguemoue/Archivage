<?php

use App\Http\Controllers\SousTypeDocumentController;
use App\Http\Controllers\SousTypeFieldController;
use App\Http\Controllers\TypeDocumentController;
use Illuminate\Support\Facades\Route;
Route::group([
	"prefix" => LaravelLocalization::setLocale(),
	'middleware' => ["localeSessionRedirect","localizationRedirect","localeViewPath"]
],function() {

	Route::group([
		// 'as' => "",
		// 'prefix' => 'type',
	], function () {
		Route::resource("type", TypeDocumentController::class);
	});

	Route::group(
		[

		],
		function () {
			Route::resource("soustype", SousTypeDocumentController::class);
			Route::resource("soustype.fields", SousTypeFieldController::class);
		});
});
// dededed
// de
