<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class UrlServiceProvider extends ServiceProvider
{
	public function register()
	{

	}

	public function boot()
	{
		Request::macro("isAdminUrl",function (){
			return $this->getHost() == adminUrl();
		});
		Request::macro("isSuperAdminUrl",function (){
			return $this->getHost() == superAdminUrl();
		});
	}
}
