<?php

namespace App\Http\Requests;

use App\Http\Middleware\TrustProxies;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTypeDocumentRequest extends FormRequest
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
            "nom"=>"required|string",
            'description'=>"required"
        ];
    }
}
