<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
    	$webPermissions = [
    		"Scanner document",
			"Traiter document",
			"Voir statistique",
			"Navigation",
			"Gerer Classement",
			"Gerer Type",
			"Gerer Sous Type",
			"Gerer Sous Classement"
		];
    	$adminPermissions = [
    		"Creer utilisateur",
			"Gerer utilisateur",
			"Gerer les Structures"
		];

    	foreach ($webPermissions as $permission){
    		Permission::query()->updateOrCreate(['guard_name'=>webGuard(),"name"=>$permission],["name"=>$permission]);
		}
		 foreach ($adminPermissions as $permission){
			 Permission::query()->updateOrCreate(['guard_name'=>adminGuard(),"name"=>$permission],["name"=>$permission]);
		 }
    }
}
