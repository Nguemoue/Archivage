<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;
    protected $guarded = [];
    function sousType(){
        return $this->belongsTo(SousTypeDocument::class, "sous_type_document_id");
    }
}
