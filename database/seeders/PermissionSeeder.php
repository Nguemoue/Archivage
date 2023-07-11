<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
    	$webPermissions = [
    		config('perm_names.SCAN_DOC'),
			config('perm_names.TRAIT_DOC'),

			config('perm_names.SHOW_STAT'),
			config('perm_names.NAV'),
			config('perm_names.MAN_CLASS'),
			config('perm_names.MAN_TYPE'),
			config('perm_names.MAN_SOUSTYPE'),
			config('perm_names.MAN_SOUSCLASS')

		];
    	$adminPermissions = [
			config('perm_names.CREATE_USER'),
			config('perm_names.MAN_USER'),
			config('perm_names.MAN_STRUCTURE'),
			config('perm_names.NAV_STRUCTURE'),
			config('perm_names.NAV_STRUCTURE_ALL')

		];

    	foreach ($webPermissions as $permission){
    		Permission::query()->updateOrCreate(['guard_name'=>webGuard(),"name"=>$permission],["name"=>$permission]);
		}
		 foreach ($adminPermissions as $permission){
			 Permission::query()->updateOrCreate(['guard_name'=>adminGuard(),"name"=>$permission],["name"=>$permission]);
		 }
    }
}
