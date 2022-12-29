<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempDossierDocument extends Model
{
    use HasFactory;
    protected $table = "temp_dossiers_documents";
    protected $fillable = [
        'temp_dossier_id','temp_document_id'
    ];

    function tempDossier(){
        return $this->belongsTo(TempDossier::class);
    }

    function tempDocument(){
        return $this->belongsTo(TempDocument::class);
    }
}
