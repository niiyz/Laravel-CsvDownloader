<?php namespace Niiyz\CSV;

use Illuminate\Support\ServiceProvider;

class CsvServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bindshared('csv', function()
        {
            return new CSV;
        });

    }

}