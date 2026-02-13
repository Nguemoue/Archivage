<?php

namespace App\Http\Requests;

use App\Models\TempDossier;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;
use TraitementProcessor;

class TraitementDossierRequest extends FormRequest
{
    public function rules(): array
    {
        return [
			  'copy'=>['nullable','boolean']
        ];
    }

	 public function after():array
	 {
		 return [
			 function (Validator $validator) {
				 $tempDossier = TempDossier::query()->find($this->route('id'));
			 	$documents = TraitementProcessor::getAll($tempDossier->id);
				 foreach ($documents as $key=>$document){
					 if ($document['status'] != config('traitement.terminer')){
						 $validator->errors()->add("document-$key","Le traitement du document {$document->numero} doit etre complete");
					 }
					 if ($document['user_id'] == null){
						 $validator->errors()->add("document-$key","Le document {$document->numero} doit etre rattache a un utilisateur");
					 }
				 }
			 }
		 ];
	 }

    public function authorize(): bool
    {
        return true;
    }
}
