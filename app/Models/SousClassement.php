<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SousClassement extends Model
{
    protected $fillable = ['nom','ordre',"classement_id"];
    public function classement(): BelongsTo
    {
        return $this->belongsTo(Classement::class);
    }
}