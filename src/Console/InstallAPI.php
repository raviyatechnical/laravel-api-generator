<?php

namespace RaviyaTechnical\APIGenerator\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallAPI extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:install { --auth : Install authentication API scaffolding }';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install API controller and related files';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Installing API Generator...');
        $this->publishBaseController();
        if ($this->option('auth')) {
            $this->publishAuthController();
        }
        $this->info('Installed API Generator');
    }

    private function publishBaseController()
    {
        // Create and check the API directory
        $apiPath = app_path('Http/Controllers/API');
        if (!File::exists($apiPath)) {
            File::makeDirectory($apiPath);
        }

        $stub = File::get($this->getStub());

        $namespace = $this->laravel->getNamespace() . 'Http\Controllers\API';
        $rootNamespace = $this->laravel->getNamespace();
        $stub = str_replace('{{ namespace }}', $namespace, $stub);
        $stub = str_replace('{{ rootNamespace }}', $rootNamespace, $stub);

        // Copy the base controller stub file to the API directory
        $apiControllerPath = $apiPath . '/BaseController.php';
        if (!File::exists($apiControllerPath)) {
            // File::copy($this->getStub(), $apiControllerPath);
            File::put($apiControllerPath, $stub);
        }        
    }

    private function publishAuthController()
    {
        // Create and check the API directory
        $apiAuthPath = app_path('Http/Controllers/API/Auth');
        $apiAuthResourcePath = app_path('Http/Resources');

        if (!File::exists($apiAuthPath)) {
            File::makeDirectory($apiAuthPath);
        }
        if (!File::exists($apiAuthResourcePath)) {
            File::makeDirectory($apiAuthResourcePath);
        }
        // Login File
        $stub = File::get($this->getLoginStub());
        $namespace = $this->laravel->getNamespace() . 'Http\Controllers\API\Auth';
        $rootNamespace = $this->laravel->getNamespace();
        $stub = str_replace('{{ namespace }}', $namespace, $stub);
        $stub = str_replace('{{ rootNamespace }}', $rootNamespace, $stub);

        // Copy the base controller stub file to the API directory
        $apiLoginControllerPath = $apiAuthPath . '/LoginController.php';
        if (!File::exists($apiLoginControllerPath)) {
            File::put($apiLoginControllerPath, $stub);
        }
        $this->info('Created API Login Controller');
        // Register File
        $stub = File::get($this->getRegisterStub());
        $namespace = $this->laravel->getNamespace() . 'Http\Controllers\API\Auth';
        $rootNamespace = $this->laravel->getNamespace();
        $stub = str_replace('{{ namespace }}', $namespace, $stub);
        $stub = str_replace('{{ rootNamespace }}', $rootNamespace, $stub);

        $apiRegisterControllerPath = $apiAuthPath . '/RegisterController.php';
        if (!File::exists($apiRegisterControllerPath)) {
            File::put($apiRegisterControllerPath, $stub);
        }
        $this->info('Created API Register Controller');

        // Register File
        $stub = File::get($this->getAuthResourceStub());
        $namespace = $this->laravel->getNamespace() . 'Http\Resources';
        $stub = str_replace('{{ namespace }}', $namespace, $stub);

        $apiAuthResourcePath = $apiAuthResourcePath . '/AuthResource.php';
        if (!File::exists($apiAuthResourcePath)) {
            File::put($apiAuthResourcePath, $stub);
        }
        $this->info('Created API Auth Resource');
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/../../stubs/basecontroller.stub';
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getLoginStub()
    {
        return __DIR__ . '/../../stubs/Auth/LoginController.stub';
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getRegisterStub()
    {
        return __DIR__ . '/../../stubs/Auth/RegisterController.stub';
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getAuthResourceStub()
    {
        return __DIR__ . '/../../stubs/Resources/AuthResource.stub';
    }
}
