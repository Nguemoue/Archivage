<?php

namespace App\Http\Controllers\SuperAdmin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ConfirmablePasswordController extends Controller
{
	/**
	 * Show the confirm password view.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
	 */
	public function show()
	{
		return view('superAdmin.auth.confirm-password');
	}

	/**
	 * Confirm the user's password.
	 *
	 * @param Request $request
	 * @return mixed
	 */
	public function store(Request $request)
	{
		if (!Auth::guard(config('misc.guard.superAdmin'))->validate([
			'email' => $request->user(config('misc.guard.admin'))->email,
			'password' => $request->password,
		])) {
			throw ValidationException::withMessages([
				'password' => __('auth.password'),
			]);
		}

		$request->session()->put('auth.password_confirmed_at', time());

		return redirect()->intended(RouteServiceProvider::SUPER_ADMIN_HOME);
	}
}
