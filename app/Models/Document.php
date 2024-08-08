<?php

namespace App\Models;

use App\Traits\LoggableTarget;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Document extends Model
{
	use LoggableTarget;
	protected $guarded = [];

	protected $hidden = [
		'data->dossierId'
	];
	protected $casts = [
		"data" => "array"
	];

	public function sous_type_document(): BelongsTo
	{
		return $this->belongsTo(SousTypeDocument::class);
	}

	public function documentFields(): HasMany
	{
		return $this->hasMany(DocumentField::class, 'document_id');
	}


	public function fields(): BelongsToMany
	{
		return $this->belongsToMany(Field::class,DocumentField::class)->withPivot(['content']);
	}
	public function dossier(): BelongsTo
	{
		return $this->belongsTo(Dossier::class);
	}

}
