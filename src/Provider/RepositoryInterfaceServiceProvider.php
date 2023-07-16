<?php

namespace Medjadji\LaravelRepositoryInterface\Provider;


use Illuminate\Support\ServiceProvider;

use Medjadji\LaravelRepositoryInterface\Console\Commands\MakeInterfaceCommand;
use Medjadji\LaravelRepositoryInterface\Console\Commands\MakeRepositoryCommand;
use Medjadji\LaravelRepositoryInterface\Console\Commands\MakeRepositoryWithInterfaceCommand;

class RepositoryInterfaceServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeRepositoryCommand::class,
                MakeInterfaceCommand::class,
                MakeRepositoryWithInterfaceCommand::class,
            ]);
        }
    }

}