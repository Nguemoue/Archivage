<?php

namespace App\View\Components\Navigation;

use App\Models\Document;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Nette\Utils\Json;

class Modal extends Component
{
    public $id;
    public Document|null $document = null;
    public $content = [];
    public function __construct($document, $id)
    {
        $this->document = $document;
        $this->id = $id;
//        $fields = $this->content= $this->document->fields;
//		  $documentFields = $this->document->documentFields;
//		  dd($this->content);
    }

    public function render(): View
    {
        return view('components.navigation.modal');
    }
}
