<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Document extends Model
{
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

	public function dossierDocument(): HasOne
	{
		return $this->hasOne(DossierDocument::class, 'document_id');
	}

}
