<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
	/**
	 * The path to the "home" route for your application.
	 *
	 * This is used by Laravel authentication to redirect users after login.
	 *
	 * @var string
	 */
	public const HOME = '/';
	public const SUPER_ADMIN_HOME = "/";

	/**
	 * the path to the "home" route for administrateur domain
	 */
	public const ADMIN_HOME = "/";

	/**
	 * The controller namespace for the application.
	 *
	 * When present, controller route declarations will automatically be prefixed with this namespace.
	 *
	 * @var string|null
	 */
	// protected $namespace = 'App\\Http\\Controllers';

	/**
	 * Define your route model bindings, pattern filters, etc.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->configureRateLimiting();

		$this->routes(function () {
			$this->bootApiRoutes();
			$this->bootSuperAdminRoutes();
			$this->bootAdminRoutes();
			$this->bootWebRoutes();
			$this->bootTestRoutes();
		});

	}

	/**
	 * Configure the rate limiters for the application.
	 *
	 * @return void
	 */
	protected function configureRateLimiting()
	{
		RateLimiter::for('api', function (Request $request) {
			return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
		});
		RateLimiter::for("web.home",function (Request $request){
			return Limit::perMinute(6)->by(optional($request->user())->id?: $request->getClientIp());
		});
	}

	private function bootApiRoutes()
	{
		Route::prefix('api')
//                ->middleware('api')
			->namespace($this->namespace)
			->group(base_path('routes/api.php'));
	}

	private function bootAdminRoutes()
	{
		Route::domain(adminUrl())
			->middleware(["web"])
			->namespace($this->namespace)
			->group(base_path("routes/admin/administrateur.php"));
	}

	private function bootWebRoutes()
	{
		Route::domain(webUrl())
			->middleware('web')
			->namespace($this->namespace)
			->group(base_path('routes/web.php'));
	}

	private function bootSuperAdminRoutes()
	{
		Route::domain(superAdminUrl())
			->middleware(["web"])
			->namespace($this->namespace)
			->group(base_path("routes/superAdmin/superadministrateur.php"));
	}

	private function bootTestRoutes()
	{
		Route::middleware(["web"])
			->namespace($this->namespace)
			->group(base_path("routes/test.php"));
	}
}
