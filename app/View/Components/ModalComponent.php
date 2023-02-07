<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ModalComponent extends Component
{
	public $id;
	/**
	 * @var null
	 */
	public $title;

	function __construct($id,$title=null){
		$this->id = $id;
		$this->title = $title;
	}
    public function render()
    {
        return view('components.modal-component');
    }
}
