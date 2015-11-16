<?php namespace Canducci\Weather\Providers;

use Canducci\Weather\Weather;
use Illuminate\Support\ServiceProvider;

class WeatherServiceProvider extends  ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Canducci\Weather\Contracts\IWeatherClient','Canducci\Weather\WeatherClient');
        $this->app->singleton('Canducci\Weather\Contracts\IWeather', function($app)
        {
            return new Weather($app['Canducci\Weather\Contracts\IWeatherClient']);
        });
    }
}