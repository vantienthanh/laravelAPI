<?php

namespace Modules\Color\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Color\Events\Handlers\RegisterColorSidebar;

class ColorServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
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
        $this->registerBindings();
        $this->app['events']->listen(BuildingSidebar::class, RegisterColorSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('colors', array_dot(trans('color::colors')));
            // append translations

        });
    }

    public function boot()
    {
        $this->publishConfig('color', 'permissions');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Color\Repositories\ColorRepository',
            function () {
                $repository = new \Modules\Color\Repositories\Eloquent\EloquentColorRepository(new \Modules\Color\Entities\Color());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Color\Repositories\Cache\CacheColorDecorator($repository);
            }
        );
// add bindings

    }
}
