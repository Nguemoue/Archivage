<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $casts = [
        'data'=>'array'
    ];

    protected $hidden = [
        'data->dossierId'
    ];
}