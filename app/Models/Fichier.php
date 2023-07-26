<?php

namespace App\Models;

use App\Traits\LoggableTarget;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Fichier extends Model
{
    use HasFactory,LoggableTarget;
    protected $fillable = [
        'nom','url','numero'
    ];

    /**
     * retourne une decision pour le fichier specifie
     * @return HasOne
     */
    function decision(){
        return $this->hasOne(DecisionFichier::class);
    }
}
