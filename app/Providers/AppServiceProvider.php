<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Instrumento;
use App\Observers\InstrumentoObserver;
use App\Models\Inventario;
use App\Observers\InventarioObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Instrumento::observe(InstrumentoObserver::class); 
        Inventario::observe(InventarioObserver::class); 
    }
}
