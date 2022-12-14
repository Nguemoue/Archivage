<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DecisionFichier extends Model
{
    use HasFactory;
    protected $fillable = [
        'code','fichier_id',
        'nature'
    ];

    function fichier(){
        return $this->belongsTo(Fichier::class);
    }

}
