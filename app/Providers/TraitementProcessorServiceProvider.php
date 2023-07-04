<?php

namespace App\Providers;

use App\Contracts\Traitement\TraitementDocumentContract;
use App\Services\SessionTraitementDocument;
use Illuminate\Support\ServiceProvider;

class TraitementProcessorServiceProvider extends ServiceProvider
{
    public function register()
    {
		 $this->app->bind(TraitementDocumentContract::class, SessionTraitementDocument::class);
	 }

    public function boot()
    {
    }
}
