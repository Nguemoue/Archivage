<?php

namespace App\View\Components\Navigation;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalPreview extends Component
{

	public $id;
//	public $hash;
	public $nom;
	public $document;

	/**
	 * ModalPreview constructor.
	 * @param $document
	 * @param $id
	 */
	function __construct($document, $id)
	{
		$this->id = $id;
		$this->document = $document;

	}

	public function render(): View
	{
		return view('components.navigation.modal-preview');
	}
}
