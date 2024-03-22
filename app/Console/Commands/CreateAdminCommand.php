<?php

namespace App\Console\Commands;

use App\Models\Admin;
use App\Models\Structure;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;

class CreateAdminCommand extends Command
{
    protected $signature = 'create:admin';

    protected $description = 'Command description';

    public function handle():void
    {
        $structures = Structure::query()->pluck('nom')->toArray();
		  $structureName = $this->choice(question: "Choose structure",choices: $structures,default: Arr::first($structures));
		  $structureModel = Structure::query()->where('nom','=',$structureName)->first();
		  \DB::transaction(function () use ($structureModel,$structureName){
			  $admin = Admin::factory()->create([
				  'structure_id' => $structureModel->id
			  ]);
			  $this->info("Admin created");
			  $this->table(['id','email','name','structure','role'],[[$admin->id,$admin->email,$admin->name,$structureName,$admin->role]]);
		  });


    }
}
