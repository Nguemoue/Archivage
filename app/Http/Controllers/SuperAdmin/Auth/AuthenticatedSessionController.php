<?php

namespace App\Http\Controllers\SuperAdmin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SuperAdminLoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
	public function create()
	{
		return view("superAdmin.auth.login");
	}

	/**
	 * Handle an incoming authentication request.
	 *
	 * @param SuperAdminLoginRequest $request
	 * @return RedirectResponse
	 */
	public function store(SuperAdminLoginRequest $request)
	{
		$request->authenticate();

		return redirect()->intended(RouteServiceProvider::SUPER_ADMIN_HOME);
	}

	/**
	 * Destroy an authenticated session.
	 *
	 * @param Request $request
	 * @return RedirectResponse
	 */
	public function destroy(Request $request)
	{
		Auth::guard(superAdminGuard())->logout();
		/* je reset mon token */
		$request->session()->invalidate();
		/* je regénère mon token d'authentification */
		$request->session()->regenerateToken();
		return redirect(RouteServiceProvider::SUPER_ADMIN_HOME);
	}
}
