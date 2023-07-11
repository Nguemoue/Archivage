<?php

namespace App\Models;

use App\Casts\TraitementCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Enumerable;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Node\Block\Document;

class TempDossier extends Model
{
    use HasFactory;
    public const DEFAULT_PATH = "temp_dossiers";

    protected $guarded = [];

    function tempDocuments(){
        return $this->belongsToMany(TempDocument::class,TempDossierDocument::class);
    }

    function get0Attribute(){
        return null;
    }
    protected $casts = [
        'date'=>'date',
    ];

    protected $appends = [
    		"size"=> 0
	 ];
}
