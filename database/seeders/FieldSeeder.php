<?php

namespace Database\Seeders;

use App\Models\Field;
use App\Models\SousTypeDocument;
use App\Models\TypeDocument;
use Illuminate\Database\Seeder;

class FieldSeeder extends Seeder
{
    public function run(): void
    {
		 TypeDocument::updateOrCreate([
			 'id'=>1,
		 ],[
			 'nom'=>'test',
			 'description'=>'test'
		 ]);
		 SousTypeDocument::updateOrCreate([
			 'id'=>1,
		 ],[
			 'type_document_id'=>1,
			 'nom'=>'test'
		 ]);

        Field::updateOrCreate([
			  'nom'=>'input'
		  ],[
			  'label'=>'label',
			  'name'=>'test',
			  'required' => false,
			  'class'=>'form-control',
			  'sous_type_document_id'=>1
		  ]);
    }
}
