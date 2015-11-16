<?php namespace Canducci\Weather;

use Canducci\Weather\Contracts\ICity;

class City implements ICity {

    protected $id;
    protected $name;
    protected $uf;

    function __construct($id, $name, $uf)
    {
        $this->id = $id;
        $this->name = $name;
        $this->uf = $uf;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getUf()
    {
        return $this->uf;
    }
}