<?php namespace Canducci\Weather;

use Canducci\Weather\Contracts\IForecast;

class Forecast implements IForecast {

    protected $city;
    protected $uf;
    protected $updated;
    protected $dates = array();

    public function __construct($city, $uf, $updated, $dates)
    {
        $this->city = $city;
        $this->uf = $uf;
        $this->updated = $updated;
        $this->dates = $dates;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getUf()
    {
        return $this->uf;
    }

    public function getUpdated()
    {
        return $this->updated;
    }

    public function getDates()
    {
        return $this->dates;
    }
}