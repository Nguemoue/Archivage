<?php

namespace App\Http\Requests\Scan;

use Illuminate\Foundation\Http\FormRequest;

class ScanFolderStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
			  'title' => ['required'],
			  'files' => ['required'],
			  'existing_folder' => ['required','bool'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
