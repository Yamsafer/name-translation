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
            __DIR__.'/../../config/translation.php' => config_path('translation.php'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $packageConfigFile = __DIR__.'/../../config/translation.php';
        $this->mergeConfigFrom(
            $packageConfigFile, 'translation'
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
        $this->app->singleton(Translation::class, function ($app) {
            return new NameTranslation\TranslationManager($app);
        });
    }
}
