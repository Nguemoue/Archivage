<?php

Route::group([
	"prefix" => LaravelLocalization::setLocale(),
	"as" => "admin.",
	'middleware' => ["localeSessionRedirect","localizationRedirect","localeViewPath"]
],function (){
	Route::get("/change_password/init",[\App\Http\Controllers\Admin\ChangePasswordController::class,"index"])
		->name("change-password.init");
	Route::post("/change_password/store",[\App\Http\Controllers\Admin\ChangePasswordController::class,"store"])
		->name("change-password.store");
});
