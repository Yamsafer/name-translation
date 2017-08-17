<?php

namespace NameTranslation;

class TranslationManager
{
    /**
    * The application instance.
    *
    * @var \Illuminate\Foundation\Application
    */
    protected $app;

    /**
     * The used connection
     *
     * @var string
     */
    protected $connection;

     /**
     * Constructor
     *
     * @param \Illuminate\Foundation\Application $app
     */
    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * Get the name of the default translation connection.
     *
     * @return string
     */
    public function getDefaultDriver()
    {
        return $this->app['config']['name-translation.default'];
    }

    /**
     * Set the name of the default translation connection.
     *
     * @param  string  $name
     * @return void
     */
    public function setDefaultDriver($name)
    {
        $this->app['config']['name-translation.default'] = $name;
    }

    /**
     * Resolve a translation connection instance.
     *
     * @param  string  $name
     * @return \NameTranslation\TranslationDriver\Google||Rosette.Translation
     */
    public function connection($name = null)
    {
        if (!isset($name) || $name == null) {
            $this->connection = $this->getDefaultDriver();
        } else {
            $this->connection = $name;
        }

        $class = '\NameTranslation\TranslationDriver\\'.ucfirst($this->connection).'Translation';

        return new $class(new Client(), $this->app);
    }

    /**
     * Dynamically pass calls to the default connection.
     *
     * @param  string  $method
     * @param  array   $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return $this->connection()->$method(...$parameters);
    }
}
