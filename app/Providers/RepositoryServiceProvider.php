<?php

namespace App\Providers;

use App\Repository\EloquentRepositoryInterface;
use App\Repository\UserRepositoryInterface;
use App\Repository\PlansRepositoryInterface;
use App\Repository\Eloquent\UserRepository;
use App\Repository\Eloquent\PlansRepository;
use App\Repository\Eloquent\BaseRepository;
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
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(PlansRepositoryInterface::class, PlansRepository::class);
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
