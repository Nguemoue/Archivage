<?php

namespace App\Models;

use App\Traits\LoggableTarget;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TempDocument extends Model
{
    use LoggableTarget;

    public const DEFAULT_PATH = "temp_documents";

    protected $guarded = [];

    protected $casts = [
    	"data" => "array"
	 ];
    public function tempDossier():BelongsTo{
        return $this->belongsTo(TempDossier::class);
    }

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}

	public function structure(): BelongsTo
	{
		return $this->belongsTo(Structure::class);
	}

	public function extensionImage(): Attribute
	{
		return Attribute::make(
			get: fn($value, array $attributes) => asset('icones/'.($this->data['extension'] ==="pdf"?'pdf':'img' ).'.png'),
		);
	}

	public function tempDocumentFields(): HasMany
	{
		return $this->hasMany(TempDocumentField::class, 'temp_document_id');
	}


	public function fields(): BelongsToMany
	{
		return $this->belongsToMany(Field::class,TempDocumentField::class);
	}

	public function sousTypeDocument()
	{
		return $this->belongsTo(SousTypeDocument::class);
	}

}
