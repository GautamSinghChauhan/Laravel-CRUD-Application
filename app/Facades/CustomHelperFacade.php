<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class CustomHelperFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'customhelper';
    }
}