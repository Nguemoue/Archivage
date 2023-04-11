<?php

namespace App\View\Components\Navigation;

use App\Models\Document;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{
    public $documentUrl;
    public $id;
    public $document = null;
    public $content = [];
    public function __construct($documentUrl,$id)
    {
        $this->documentUrl = $documentUrl;
        $this->id = $id;
        $this->document = Document::query()->where("url",'like',$this->documentUrl)->first();
        $d= optional($this->document)->data;
        $this->content= $d;
        
    }

    public function render(): View
    {
        return view('components.navigation.modal');
    }
}
