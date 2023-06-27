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
			"Navigation"
		];
    	$adminPermissions = [
    		"Creer utilisateur",
			"Gerer utilisateur",
		];

    	foreach ($webPermissions as $permission){
    		Permission::query()->updateOrCreate(['guard_name'=>webGuard(),"name"=>$permission],["name"=>$permission]);
		}
		 foreach ($adminPermissions as $permission){
			 Permission::query()->updateOrCreate(['guard_name'=>adminGuard(),"name"=>$permission],["name"=>$permission]);
		 }
    }
}
