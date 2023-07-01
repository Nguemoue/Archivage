<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Spatie\Permission\Exceptions\UnauthorizedException;

/**
 * Class PasswordChangedMiddleware
 *  ici l'utilisateur doit etre authentifie pour pouvoir bénéficier de ce middleware
 * @package App\Http\Middleware
 */
class PasswordChangedMiddleware
{
    public function handle(Request $request, Closure $next, $guard = null)
    {


		 $authGuard = app('auth')->guard($guard);
		 if ($authGuard->guest()) {
			 throw UnauthorizedException::notLoggedIn();
		 }
		 $paswwordChange = $authGuard->user()->password_changed_at;
		 if($paswwordChange==null){
			 return redirect()->route($guard.".change-password.init");
		 }

		  return $next($request);
    }

}
