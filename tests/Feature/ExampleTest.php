<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
    	$user = User::first();
    	$response = $this->actingAs($user,"web")
			->withoutMiddleware(["localeSessionRedirect","localizationRedirect","localeViewPath"])
			 ->get(route('home'));
    	$locale = LaravelLocalization::getCurrentLocale();

		 $response->assertRedirect(route("home").'/'.$locale);
//    	dd(,$response->isRedirect(route('home')));
//    	$response->assertRedirect(route('home'));

    }
}
