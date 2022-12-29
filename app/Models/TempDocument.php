<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempDocument extends Model
{
    use HasFactory;
    public const DEFAULT_PATH = "temp_documents";

    protected $fillable = [
        'numero','url','nom'
    ];

    function tempDossiers(){
        return $this->belongsToMany(TempDossier::class,TempDossierDocument::class);
    }
}
