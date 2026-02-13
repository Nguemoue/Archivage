<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Classement */
class ClassementResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nom' => $this->nom,
            'ordre' => $this->ordre,
            'sousCLassements' => SousClassementCollection::collection($this->whenLoaded('sousCLassements')),
        ];
    }
}
