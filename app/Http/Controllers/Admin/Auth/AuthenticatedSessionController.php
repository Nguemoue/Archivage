<?php


namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AdminLoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
	public function create()
	{
		return view("admin.auth.login");
	}

	/**
	 * Handle an incoming authentication request.
	 *
	 * @param AdminLoginRequest $request
	 * @return RedirectResponse
	 */
	public function store(AdminLoginRequest $request)
	{

		$request->authenticate();

		return redirect()->intended(RouteServiceProvider::ADMIN_HOME);
	}

	/**
	 * Destroy an authenticated session.
	 *
	 * @param Request $request
	 * @return RedirectResponse
	 */
	public function destroy(Request $request)
	{


		Auth::guard(adminGuard())->logout();
		$request->session()->invalidate();
		$request->session()->regenerateToken();
		return redirect(RouteServiceProvider::ADMIN_HOME);
	}
}

