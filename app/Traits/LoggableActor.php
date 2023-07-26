<?php


namespace App\Traits;


trait LoggableActor
{

	public function LogActorForHumans(): string
	{
		return $this->name | $this->email;
	}
}
