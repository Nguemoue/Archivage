<?php

namespace App\Http\Controllers\SuperAdmin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        return $request->user(config('misc.guard.superAdmin'))->hasVerifiedEmail()
                    ? redirect()->intended(RouteServiceProvider::SUPER_ADMIN_HOME)
                    : view('auth.verify-email');
    }
}
