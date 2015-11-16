<?php namespace Canducci\Weather;

use Canducci\Weather\Contracts\IDates;

class Dates implements IDates {

    protected $date;
    protected $iuv;
    protected $min;
    protected $max;
    protected $time;

    public function __construct($date, $iuv, $min, $max, $time)
    {
        $this->date = $date;
        $this->iuv = $iuv;
        $this->min = $min;
        $this->max = $max;
        $this->time = $time;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getIuv()
    {
        return $this->iuv;
    }

    public function getMin()
    {
        return $this->min;
    }

    public function getMax()
    {
        return $this->max;
    }

    public function getTime()
    {
        return $this->time;
    }
}