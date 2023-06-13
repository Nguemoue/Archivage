<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
	protected $guarded=[];
	function profile(){
		return $this->morphTo("profile");
	}
}
