<?php

namespace App\Http\Requests\Scan;

use Illuminate\Foundation\Http\FormRequest;

class ScanFolderStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
			  'title'=>['required','string'],
			  'files'=>['required']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
