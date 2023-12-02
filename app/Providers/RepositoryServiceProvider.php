<?php

namespace App\Providers;

use App\Repositories\Contracts\EloquentRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Contracts\MerchantRepositoryInterface;
use App\Repositories\Contracts\StoreRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Contracts\CartRepositoryInterface;
use App\Repositories\Contracts\CartDetailsRepositoryInterface;
use App\Repositories\Contracts\CustomerRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Eloquent\CartDetailsRepository;
use App\Repositories\Eloquent\CartRepository;
use App\Repositories\Eloquent\CustomerRepository;
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
        $this->app->bind(CartRepositoryInterface::class,CartRepository::class);
        $this->app->bind(CartDetailsRepositoryInterface::class,CartDetailsRepository::class);
        $this->app->bind(CustomerRepositoryInterface::class,CustomerRepository::class);

    
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
