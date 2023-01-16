<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeDocument extends Model
{
    use HasFactory;

    protected $fillable = ["nom", "description"];

    function sousTypes(){
        return $this->hasMany(SousTypeDocument::class,"type_document_id");
    }
}
