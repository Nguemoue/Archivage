<?php

namespace App\Console\Commands;

use App\Models\SuperAdmin;
use Illuminate\Console\Command;

class generateSuperAdminCommand extends Command
{
	protected $signature = 'generate:super-admin';

	protected $description = "Genere un super administrateur au hazard et affiche ses information ";

	public function handle(...$args)
	{

		$generated = SuperAdmin::factory(1)->create();
		echo "Administrateur génere avec succes mot de passe par defaut : password \n ";
		dump($generated->first()->only("email","name","id"));
		dump("commande effectué avec successs");

	}
}
