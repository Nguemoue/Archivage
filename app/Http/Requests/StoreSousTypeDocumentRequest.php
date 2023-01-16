<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSousTypeDocumentRequest extends FormRequest
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
            'nom'=>"required|string|min:4|unique:sous_type_documents,nom",
            "description"=>"required",
            "type_document_id"=>"required|integer|exists:type_documents,id"
        ];
    }
    function messages()
    {
        return [
            "type_dopcument_id.required"=>"vous devez selectionner le type du document ou en creer un noveau",
            "type_dopcument_id.exists"=>"le type de document n'a pas ete trouve"
        ];
    }
}
