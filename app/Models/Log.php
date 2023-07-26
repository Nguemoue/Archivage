<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Log extends Model
{
	protected $casts = [
		"data"=>"array"
	];
	protected $guarded = [];

	public function actor(): MorphTo
	{
		return $this->morphTo("loggable_actor");
	}

	public function target(): MorphTo
	{
		return $this->morphTo("loggable_target");
	}
}
