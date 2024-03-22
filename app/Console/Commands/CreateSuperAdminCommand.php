<?php

namespace App\Console\Commands;

use App\Models\SuperAdmin;
use Faker\Factory;
use Illuminate\Console\Command;

class CreateSuperAdminCommand extends Command
{
	protected $signature = 'create:super-admin';

	protected $description = 'Command description';

	public function handle(): void
	{

		$email = $this->ask("Enter email address");
		$password = $this->ask('Enter password','password');
		$generated = SuperAdmin::factory()->create([
			'email' => $email,
			'password' => bcrypt($password),
		]);
		$this->table(['id', 'email', 'name', 'password'], [[$generated->id, $generated->email, $generated->name, $password]]);
		$this->info("generation successfully");
	}
}
