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
    protected $signature = 'api:install';
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
        $this->info('Installed API Generator');
    }


    private function publishBaseController()
    {
        // Create the API directory
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

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/../../stubs/basecontroller.stub';
    }
}
