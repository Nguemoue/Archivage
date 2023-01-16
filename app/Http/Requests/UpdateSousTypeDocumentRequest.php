<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSousTypeDocumentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nom'=>"required|string",
            "description"=>"required|string",
            "type_document_id"=>"required|exists:type_documents,id"
        ];

    }

    function messages()
    {
        return [
            'type_document_id.reauired' => "le type de document est requis",
            'type_document_id.exists' => "ce type de document n'est pas present en base de donnees",
        ];
    }
}
