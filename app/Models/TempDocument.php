<?php

namespace App\Models;

use App\Traits\LoggableTarget;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TempDocument extends Model
{
    use HasFactory,LoggableTarget;

    public const DEFAULT_PATH = "temp_documents";

    protected $guarded = [];

    protected $casts = [
    	"data" => "array"
	 ];
    function tempDossiers():BelongsToMany{
        return $this->belongsToMany(TempDossier::class,TempDossierDocument::class);
    }


}
