<?php

namespace Aspect\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class AspectDomainServiceProvider extends ServiceProvider
{

    public function boot(): void
    {
        $this->routes(function () {
             Route::prefix('aspect')
                ->group(__DIR__ . '/../../routes/aspect.php');
        });
       $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations/*');
   }
}
