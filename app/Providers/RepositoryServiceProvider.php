<?php

namespace App\Providers;

use App\Contracts\Api\V1\UserInterface;
use App\Contracts\Api\V1\ItemInterface;
use App\Contracts\Api\V1\RecordInterface;
use App\Contracts\Api\V1\CategoryInterface;
use App\Repositories\Api\V1\UserRepository;
use App\Repositories\Api\V1\ItemRepository;
use App\Repositories\Api\V1\RecordRepository;
use App\Repositories\Api\V1\CategoryRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserInterface::class, UserRepository::class);
        $this->app->bind(ItemInterface::class, ItemRepository::class);
        $this->app->bind(RecordInterface::class, RecordRepository::class);
        $this->app->bind(CategoryInterface::class, CategoryRepository::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            UserInterface::class,
            ItemInterface::class,
            RecordInterface::class,
            CategoryInterface::class,
        ];
    }
}
