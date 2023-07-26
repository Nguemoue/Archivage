<?php

namespace App\Models;

use App\Traits\LoggableTarget;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Classement extends Model
{
	use LoggableTarget;
    protected $guarded = [];

    public function sousCLassements(): HasMany
    {
        return $this->hasMany(SousClassement::class,"classement_id");
    }
}
