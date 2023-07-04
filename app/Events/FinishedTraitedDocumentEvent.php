<?php

namespace App\Events;

use App\Models\TempDocument;
use Illuminate\Foundation\Events\Dispatchable;

class FinishedTraitedDocumentEvent
{
    use Dispatchable;

    public function __construct(TempDocument $document)
    {
    }
}
