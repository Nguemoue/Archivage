<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Structure extends Model
{
	use HasFactory;

	protected $guarded = [];
	public function users(): HasMany
	{
		return $this->hasMany(User::class, 'structure_id');
	}
	public function admins(): HasMany
	{
		return $this->hasMany(Admin::class, 'structure_id');
	}
}
