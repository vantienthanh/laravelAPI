<?php

namespace Modules\Category\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Category\Events\Handlers\RegisterCategorySidebar;

class CategoryServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterCategorySidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('categories', array_dot(trans('category::categories')));
            $event->load('users', array_dot(trans('category::users')));
            // append translations


        });
    }

    public function boot()
    {
        $this->publishConfig('category', 'permissions');

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
            'Modules\Category\Repositories\CategoryRepository',
            function () {
                $repository = new \Modules\Category\Repositories\Eloquent\EloquentCategoryRepository(new \Modules\Category\Entities\Category());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Category\Repositories\Cache\CacheCategoryDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Category\Repositories\UsersRepository',
            function () {
                $repository = new \Modules\Category\Repositories\Eloquent\EloquentUsersRepository(new \Modules\Category\Entities\Users());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Category\Repositories\Cache\CacheUsersDecorator($repository);
            }
        );
// add bindings


    }
}
