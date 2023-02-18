<?php

namespace RaviyaTechnical\APIGenerator;

use Illuminate\Support\ServiceProvider;
use RaviyaTechnical\APIGenerator\Console\MakeAPIController;

class APIGeneratorServiceProvider extends ServiceProvider
{

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeAPIController::class
            ]);
        }
    }
}
