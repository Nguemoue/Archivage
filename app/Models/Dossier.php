<?php

namespace App\Models;

use App\Traits\LoggableTarget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dossier extends Model
{
    use HasFactory,LoggableTarget;

    protected $guarded = [];

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}

	public function structure(): BelongsTo
	{
		return $this->belongsTo(Structure::class);
	}

	public function sousClassement(): BelongsTo
	{
		return $this->belongsTo(SousClassement::class);
	}
    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

	public function scopeClassed(Builder $query): Builder
	{
		return $query->where('is_classed', true);
	}

	public function scopeNotClassed(Builder $query): Builder
	{
		return $query->where('is_classed', false);
	}
}
