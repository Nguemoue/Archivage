<?php

namespace App\Livewire\Scann;

use App\Models\Fichier;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class ScannElement extends Component
{
    use WithFileUploads;
    protected $rules = [
        'titre'=>'required|string|min:4',
        'type'=>'required|min:4',
    ];
    public $images = [];
    public $titre = '';
    public $genre = 'acte';
    public $type = 'document';

    function submit(){
        if($this->type =="document"){
            foreach($this->images as $image){
                Fichier::query()->create([
                    'numero'=>Str::uuid(),
                    'nom'=>$this->titre.''.uniqid(),
                    'url'=>  $image->store("temp_documents")
                ]);
            }
            session()->flash('success', "documents creer avec success");
        }else{

        }
    }
    function updated($field,$newVal){
        if($field == 'titre')
            $this->validateOnly($field);

    }
    public function render()
    {
        return view('livewire.scann.scann-element');
    }
}
