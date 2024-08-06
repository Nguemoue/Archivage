<?php

namespace App\Models;

use App\Casts\TraitementCast;
use App\Traits\LoggableTarget;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Enumerable;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Node\Block\Document;

class TempDossier extends Model
{
    use LoggableTarget;
    public const DEFAULT_PATH = "temp_dossiers";

    protected $guarded = [];

	protected $casts = [
		'date'=>'date',
	];

    public function tempDocuments(): HasMany
	 {
        return $this->hasMany(TempDocument::class);
    }

}
