<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class superAdmin extends Authenticatable
{
	use Notifiable;
	function connections(): \Illuminate\Database\Eloquent\Relations\MorphMany
	{
		return $this->morphMany(Connection::class,"profile");
	}
}
