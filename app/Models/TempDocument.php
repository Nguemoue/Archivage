<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TempDocument extends Model
{
    use HasFactory;

    public const DEFAULT_PATH = "temp_documents";

    protected $fillable = [
        'numero','url','nom'
    ];

    function tempDossiers():BelongsToMany{
        return $this->belongsToMany(TempDossier::class,TempDossierDocument::class);
    }


}
