<?php

namespace Medjadji\LaravelRepositoryInterface\Facades;
use Illuminate\Support\Facades\Facade;
class LaravelRepositoryInterface extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-repository-interface';
    }
}
