<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NotificationItem extends Component
{
	function __construct(
		public $user,
		public $msg,
		public $date
	){

	}
    public function render()
    {
        return view('components.notification-item');
    }
}
