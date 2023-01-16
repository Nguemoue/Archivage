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
}
