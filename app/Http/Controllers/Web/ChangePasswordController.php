<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{
    public function index()
    {
    	$auth = app('auth')->guard(webGuard())->user();
    	return view("web.passwordReset.index",['auth'=>$auth]);
    }

    public function store(Request $request){
    	$auth = \Auth::guard(webGuard())->user();
    	$request->validate([
    		'password'=>"required|confirmed"
		]);
    	$auth->forceFill([
    		"password_changed_at" => now(),
			"password" => bcrypt($request->input("password"))
		]);
    	$auth->save();
    	\Auth::guard(webGuard())->logout();
    	return redirect()->route("login");

	 }
}
