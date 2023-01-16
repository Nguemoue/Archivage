<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTypeDocumentRequest extends FormRequest
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
            'nom'=>"required|string|unique:type_documents,nom",
            "description"=>"required|string|min:4"
        ];
    }

    public function messages()
    {
        return [
            'nom'=>[
                "required"=>"le nom du document  est requis",
                "unique"=>"la valeur du nom est deja utilise"
            ],
        ];
    }
}
