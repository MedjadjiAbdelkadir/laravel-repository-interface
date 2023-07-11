<?php

namespace Medjadji\LaravelRepositoryInterface\Controllers;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function helloWorld()
    {
        // echo "Hello World";

        return DIRECTORY_SEPARATOR;
    }
}