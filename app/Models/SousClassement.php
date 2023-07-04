<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SousClassement extends Model
{
    protected $fillable = ['nom','ordre',"classement_id"];
    public function classement(): BelongsTo
    {
        return $this->belongsTo(Classement::class);
    }
    public function dossiers(): HasMany
	 {
		 return $this->hasMany(Dossier::class, 'sous_classement_id');
	 }
}
