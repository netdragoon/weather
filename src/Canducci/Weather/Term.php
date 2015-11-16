<?php namespace Canducci\Weather;

use Canducci\Weather\Contracts\ITerm;

class Term implements ITerm {

    protected $sigla;
    protected $description;

    function __construct($sigla, $description)
    {
        $this->sigla = $sigla;
        $this->description = $description;
    }

    public function getSigla()
    {
        return $this->sigla;
    }

    public function getDescription()
    {
        return $this->description;
    }
}