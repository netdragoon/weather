<?php

use Canducci\Weather\ForecastDay;

if (!function_exists('weather'))
{
    function weather()
    {
        return app('Canducci\Weather\Contracts\IWeather');
    }
}

if (!function_exists('cities'))
{
    function cities($name)
    {
        return weather()->cities($name);
    }
}

if (!function_exists('forecast'))
{
    function forecast($id, $layout = ForecastDay::Day4)
    {
        return weather()->forecast($id, $layout);
    }
}