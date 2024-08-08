<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SousTypeDocument extends Model
{
    use HasFactory;
    protected $fillable = ["nom", "type_document_id", "description"];

    public function typeDocument(): \Illuminate\Database\Eloquent\Relations\BelongsTo
	 {
        return $this->belongsTo(TypeDocument::class, "type_document_id");
    }

    public function fields(): \Illuminate\Database\Eloquent\Relations\HasMany
	 {
        return $this->hasMany(Field::class,"sous_type_document_id");
    }

    public function documents(): \Illuminate\Database\Eloquent\Relations\HasMany
	 {
        return $this->hasMany(Document::class,"sous_type_document_id");
    }
}
