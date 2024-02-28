<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class CustomDirectiveServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        // Define the @price Blade directive
        Blade::directive('price', function ($expression,$devise = false) {
            $parts = explode(",",$expression);
            $expression = $parts[0];
            if (count($parts)>=2){
                $devise = boolval($parts[1]);
            }
            $append='';
            if ($devise){
                $append = config('misc.devise','R').config('misc.devise_separator',' ');
            }
            return "<?php echo '$append' . number_format($expression, 2, '.', ','); ?>";
        });

        Blade::if("hasRole",function ($role){
            $hasRole = false;
            $explodedRole = explode("|",$role);
            foreach ($explodedRole as $item){
                if (authUser() && (authUser()?->role->code == $item)) {
                    $hasRole = true;
                }
            }
            return $hasRole;
        });

    }
}
