<?php

namespace App\Casts;

use App\Models\TempDocument;
use App\Models\TempDossier;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class TraitementCast implements CastsAttributes
{
    public function get($model, $key, $value, $attributes)
    {
        switch ($model){
			  case TempDocument::class or TempDossier::class:
			  	if($value == 0){
			  		return 'non traite';
				}elseif ($value == 1){
			  		return 'en cours de traitement';
				}else{
			  		return 'traité';
				}
			  	break;

			  default:
			  	break;
		  }
		  return 'non traite';
    }

    public function set($model, $key, $value, $attributes)
    {
		return $value;
    }
}
