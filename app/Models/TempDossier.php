<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Node\Block\Document;

class TempDossier extends Model
{
    use HasFactory;
    public const DEFAULT_PATH = "temp_dossiers";
    protected $fillable = [
        'nom',
    ];
    
    function tempDocuments(){
        return $this->belongsToMany(TempDocument::class,TempDossierDocument::class);
    }

    protected $casts = [
        'date'=>'date'
    ];
}
