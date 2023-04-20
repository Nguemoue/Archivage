<?php

namespace App\View\Components\Navigation;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalPreview extends Component
{
	public $documentUrl;
	public $id;
	public $hash;
	public $nom;
	/**
	 * ModalPreview constructor.
	 * @param $documentUrl
	 * @param $id
	 */
	function __construct($documentUrl, $id,$nom)
	{
			$this->id=$id;
			$this->documentUrl=$documentUrl;
		$this->hash = base64_encode($this->documentUrl);
		$this->nom = $nom;
	}

	public function render(): View
    {
        return view('components.navigation.modal-preview');
    }
}
