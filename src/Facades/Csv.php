<?php namespace Niiyz\Csv\Facades;

use Illuminate\Support\Facades\Facade;

class Csv extends Facade
{

    public static function getFacadeAccessor()
    {
        return 'csv';
    }

}