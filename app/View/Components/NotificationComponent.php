<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NotificationComponent extends Component
{
	public $notifications;
	public $user;

	public function __construct($user)
	{
		$this->user = $user;
		$this->notifications = optional($this->user)->notifications();
	}

	public function render()
    {
        return view('components.notification-component');
    }
}
