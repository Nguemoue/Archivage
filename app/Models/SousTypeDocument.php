<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SousTypeDocument extends Model
{
    use HasFactory;
    protected $fillable = ["nom", "type_document_id", "description"];

    function type(){
        return $this->belongsTo(TypeDocument::class, "type_document_id");
    }

    function fields(){
        return $this->hasMany(Field::class,"sous_type_document_id");
    }

    function documents(){
        return $this->hasMany(Document::class,"sous_type_document_id");
    }
}
