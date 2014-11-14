<?php namespace Dnh\CommandArchi;

use Illuminate\Support\ServiceProvider;

class CommandArchiServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerCommandTranslator();

        $this->registerCommandBus();
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['commander'];
    }

    /**
     * Register the command translator binding
     */
    protected function registerCommandTranslator()
    {
        $this->app->bind('Dnh\CommandArchi\CommandTranslator', 'Laracasts\Commander\BasicCommandTranslator');
    }

    /**
     * Register the desired command bus implementation
     */
    protected function registerCommandBus()
    {
        $this->app->bindShared('Dnh\CommandArchi\CommandBus', function ()
        {
            return $this->app->make('Dnh\CommandArchi\ValidationCommandBus');
        });
    }


}
