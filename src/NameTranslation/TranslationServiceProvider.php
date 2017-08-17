<?php

namespace NameTranslation;

use NameTranslation\TranslationManager;
use Illuminate\Support\ServiceProvider;

class TranslationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../config/name-translation.php' => config_path('name-translation.php'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $packageConfigFile = __DIR__.'/../../config/name-translation.php';
        $this->mergeConfigFrom(
            $packageConfigFile, 'name-translation'
        );
        $this->registerManager();
    }

        /**
     * Register the Translation manager.
     *
     * @return void
     */
    protected function registerManager()
    {
        $this->app->singleton('name-translation', function ($app) {
            return new NameTranslation\TranslationManager($app);
        });
    }
}
