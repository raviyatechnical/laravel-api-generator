<?php

namespace RaviyaTechnical\APIGenerator\Console;

use Illuminate\Console\GeneratorCommand;

class MakeAPICrud extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:crud {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new api crud controller class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'API';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
    return __DIR__.'/../../stubs/crud_controller.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Http\Controllers\API';
    }
}
