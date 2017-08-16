<?php namespace NameTranslation;

use Illuminate\Support\ServiceProvider ;
use NameTranslation\TranslationManager;

class TranslationServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

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

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
