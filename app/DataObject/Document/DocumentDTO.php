<?php


namespace App\DataObject\Document;


class DocumentDTO
{
	function __construct(
		public $titre,
		public $created_at,
		public $updated_at,
		public $data
	){

	}
}
