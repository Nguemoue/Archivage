<?php

namespace App\Console\Commands;

use App\Models\SuperAdmin;
use Illuminate\Console\Command;

class ShowSuperadminCommand extends Command
{
    protected $signature = 'show:superadmin';

    protected $description = 'Affiche les super administrateur du site';

    public function handle()
    {
    	echo "Listes des super administrateur : \n";
    		dump(SuperAdmin::query()->get(['email','name'])->toArray());
    }
}
