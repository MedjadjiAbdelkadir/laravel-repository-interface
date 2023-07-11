<?php

namespace Medjadji\LaravelRepositoryInterface;

use Illuminate\Support\ServiceProvider;

use Medjadji\LaravelRepositoryInterface\Console\Commands\MakeInterfaceCommand;
use Medjadji\LaravelRepositoryInterface\Console\Commands\MakeRepositoryCommand;

class RepositoryInterfaceServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeRepositoryCommand::class,
                MakeInterfaceCommand::class,
            ]);
        }

        $this->loadRoutesFrom(__DIR__.'/admin-routes.php');
    }

}