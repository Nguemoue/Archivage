<?php

namespace App\Listeners\Auth;

use App\Http\Requests\Auth\SuperAdminLoginRequest;
use App\Models\superAdmin;
use App\Notifications\Auth\LoginNotification;
use Illuminate\Auth\Events\Login;

class LoginListener
{
	//to inject any class or service here
    public function __construct()
    {

    }

    public function handle(Login $event)
    {
    	$user = $event->user;
    	$guard = $event->guard;
    	//je selectionne le connection
		 $connections = $user->connections;
		 $currentIp = request()->getClientIp();
		 $currentDevice = \Browser::browserName() ."-" . \Browser::platformName();
		 $user->connections()->updateOrCreate(
			[
				"guard"=>$guard,
				"ip_address"=>$currentIp,
				"profile_type"=>$user::class,
				"profile_id"=>$user->id
			],
			["device"=>$currentDevice]
		 );
		//je notifies mes super admin
		 $superAdmins = superAdmin::query()->get();
		 $superAdmins->each(function($superAdmin) use($user){
		 	$superAdmin->notify(new LoginNotification($user));
		 });

    }
}
