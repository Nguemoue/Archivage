<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Field */
class FieldResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nom' => $this->nom,
            'type' => $this->type,
            'placeholder' => $this->placeholder,
            'label' => $this->label,
            'class' => $this->class,
            'min' => $this->min,
            'max' => $this->max,
            'required' => $this->required,
            'value' => $this->value,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'name' => $this->name,
            'sous_type_document_id' => $this->sous_type_document_id,
        ];
    }
}
