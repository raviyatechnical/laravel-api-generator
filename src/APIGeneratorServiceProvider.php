<?php

namespace RaviyaTechnical\APIGenerator;

use Illuminate\Support\ServiceProvider;
use RaviyaTechnical\APIGenerator\Console\InstallAPI;
use RaviyaTechnical\APIGenerator\Console\MakeAPIController;
use RaviyaTechnical\APIGenerator\Console\MakeAPICrud;

class APIGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallAPI::class,
                MakeAPIController::class,
                MakeAPICrud::class
            ]);
        }
    }
}
