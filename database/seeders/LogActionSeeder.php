<?php

namespace Database\Seeders;

use App\Models\LogAction;
use Illuminate\Database\Seeder;

class LogActionSeeder extends Seeder
{
    public function run()
    {
		//representing action as [type=>name]
    	foreach (config('misc.log_action_label') as $key=>$action){
			LogAction::query()->updateOrCreate([
				"code"=>$key
			],[
				"name"=>$action
			]);
		}
    }
}
