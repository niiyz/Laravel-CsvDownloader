<?php namespace Niiyz\Facades;

use Illuminate\Support\Facades\Facade;

class CSV extends Facade
{

    public static function getFacadeAccessor()
    {
        return 'csv';
    }

}