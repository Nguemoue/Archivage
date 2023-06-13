<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
	use Notifiable,HasFactory,HasPermissions,HasRoles;

	function connections(): \Illuminate\Database\Eloquent\Relations\MorphMany
	{
		return $this->morphMany(Connection::class,"profile");
	}
}
