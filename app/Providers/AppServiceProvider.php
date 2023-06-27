<?php

namespace App\Providers;

use App\Commands\CreateAccountCommand;
use App\CustomDispatcher;
use App\Handlers\CreateAccountHandler;
use Illuminate\Bus\Dispatcher;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Bus\Dispatcher as DispatcherContract;
use Illuminate\Contracts\Bus\QueueingDispatcher as QueueingDispatcherContract;
use Illuminate\Contracts\Queue\Factory as QueueFactoryContract;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Bus::map([
            CreateAccountCommand::class => CreateAccountHandler::class
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CustomDispatcher::class, function ($app) {
            return new CustomDispatcher($app, function ($connection = null) use ($app) {
                return $app[QueueFactoryContract::class]->connection($connection);
            });
        });

        $this->app->alias(
            CustomDispatcher::class, DispatcherContract::class
        );

        $this->app->alias(
            CustomDispatcher::class, QueueingDispatcherContract::class
        );
    }
}
