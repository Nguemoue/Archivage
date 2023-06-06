<?php

namespace App\Http\Controllers\SuperAdmin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if ($request->user(config('misc.guard.superAdmin'))->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::SUPER_ADMIN_HOME);
        }

        $request->user(config('misc.guard.superAdmin'))->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
