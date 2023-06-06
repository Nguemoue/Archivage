<?php

namespace App\Notifications\Auth;

use Illuminate\Notifications\Notification;

class LoginNotification extends Notification
{
	public $connectedUser;
    public function __construct($connectedUser)
    {
    	$this->connectedUser = $connectedUser;
    }

    public function via($notifiable): array
    {
        return ['database'];
    }

    public function toDatabase($notifiable): array
    {
        return [
        	'message'=>"nouvelle connexion dans la base de donnees"
		  ];
    }

    public function toArray($notifiable): array
    {
        return [];
    }
}
