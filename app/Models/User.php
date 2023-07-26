<?php

namespace App\Models;

use App\Contracts\LoggableTargetContract;
use App\Traits\LoggableActor;
use App\Traits\LoggableTarget;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasPermissions,HasRoles,LoggableActor,LoggableTarget;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
		 'structure_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

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
		return webGuard();
	}

}
