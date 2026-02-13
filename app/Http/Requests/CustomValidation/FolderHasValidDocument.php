<?php

namespace App\Http\Requests\CustomValidation;

use Illuminate\Validation\Validator;

class FolderHasValidDocument
{
	public function __invoke(Validator $validator)
	{
	}

}

