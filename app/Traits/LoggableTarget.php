<?php


namespace App\Traits;


trait LoggableTarget
{
	public function LogTargetForHumans(): string
	{
		return $this->getTable() ." ". ($this->numero??$this->name??$this->nom) .
			($this->structure?" rattaché à  la structure ".$this->structure->nom:'');
	}
}
