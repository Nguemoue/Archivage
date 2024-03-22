<?php

namespace App\Console\Commands;

use App\Models\SuperAdmin;
use Illuminate\Console\Command;

class ListSuperAdminCommand extends Command
{
	protected $signature = 'list:super-admin';

	protected $description = 'display all super admin in the application';

	public function handle(): void
	{
		$this->info('List of super administrators');
		$superAdmins = SuperAdmin::query()->get(['name', 'email', 'organisation'])->toArray();
		$this->table(['name', 'email', 'organisation'], $superAdmins);
	}
}
