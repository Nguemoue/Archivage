<?php

namespace App\Models;

use App\Contracts\LoggableTargetContract;
use App\Traits\LoggableActor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class SuperAdmin extends Authenticatable
{
	use Notifiable,HasFactory,LoggableActor;
	function connections(): \Illuminate\Database\Eloquent\Relations\MorphMany
	{
		return $this->morphMany(Connection::class,"profile");
	}

}
