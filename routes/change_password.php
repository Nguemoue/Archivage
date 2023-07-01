<?php

Route::group([
	"prefix" => LaravelLocalization::setLocale(),
	"as"=>"web.",
	'middleware' => ["localeSessionRedirect","localizationRedirect","localeViewPath"]
],function (){
	Route::get("/change_password/init",[\App\Http\Controllers\Web\ChangePasswordController::class,"index"])
		->name("change-password.init");
	Route::post("/change_password/store",[\App\Http\Controllers\Web\ChangePasswordController::class,"store"])
		->name("change-password.store");
});
