<?php

namespace App\Providers;

use App\Repositories\Contracts\EloquentRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Contracts\MerchantRepositoryInterface;
use App\Repositories\Contracts\StoreRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Eloquent\ProductRepository;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\Eloquent\MerchantRepository;
use App\Repositories\Eloquent\StoreRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //Dependency injection
        $this->app->bind(EloquentRepositoryInterface::class,BaseRepository::class);
        $this->app->bind(UserRepositoryInterface::class,UserRepository::class);
        $this->app->bind(MerchantRepositoryInterface::class,MerchantRepository::class);
        $this->app->bind(StoreRepositoryInterface::class,StoreRepository::class);
        $this->app->bind(ProductRepositoryInterface::class,ProductRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
