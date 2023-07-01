<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
	use Notifiable,HasFactory,HasPermissions,HasRoles;

	protected $guarded = [];

	function connections(): \Illuminate\Database\Eloquent\Relations\MorphMany
	{
		return $this->morphMany(Connection::class,"profile");
	}

	public function structure(): BelongsTo
	{
		return $this->belongsTo(Structure::class);
	}
	public function getDefaultGuardName()
	{
		return adminGuard();
	}
}
