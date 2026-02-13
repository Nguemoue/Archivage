<?php

namespace App\Models;

use App\Traits\LoggableTarget;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class TempDocument extends Model implements HasMedia
{
    use LoggableTarget,InteractsWithMedia;

    public const DEFAULT_PATH = "temp_documents";

    protected $guarded = [];

    protected $casts = [
    	"data" => "array"
	 ];
    function tempDossiers():BelongsToMany{
        return $this->belongsToMany(TempDossier::class,TempDossierDocument::class);
    }



}
