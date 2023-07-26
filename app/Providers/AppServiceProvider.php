<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\Document;
use App\Models\Dossier;
use App\Models\Structure;
use App\Models\TempDossier;
use App\Models\User;
use App\Observers\LogObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{

	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$supportedLocales = LaravelLocalization::getSupportedLocales();
		\View::share("supportedlocales", $supportedLocales);
		Paginator::useBootstrap();
		User::observe([LogObserver::class]);
		Dossier::observe([LogObserver::class]);
		TempDossier::observe([LogObserver::class]);
		Document::observe([LogObserver::class]);
		Admin::observe([LogObserver::class]);
		Structure::observe([LogObserver::class]);
	}
}
