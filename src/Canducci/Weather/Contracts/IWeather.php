<?php namespace Canducci\Weather\Contracts;

use Canducci\Weather\ForecastDay;

interface IWeather {
    public function cities ($name);
    public function forecast($id, $layout = ForecastDay::Day4);
}