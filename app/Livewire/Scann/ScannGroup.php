<?php

namespace App\Livewire\Scann;

use App\Models\Fichier;
use Livewire\Component;

class ScannGroup extends Component
{
    public $isElementCreated = false;

    function  createScannElement(){
        $this->isElementCreated = true;
        dd('yes');
    }
    public function render()
    {
        return view('livewire.scann.scann-group',[
            'fichiers'=> Fichier::query()->whereYear("created_at","=",now()->year)
                            ->whereMonth("created_at","=",now()->month)->whereDay("created_at","=",now()->day)->get()
        ]);
    }
}
