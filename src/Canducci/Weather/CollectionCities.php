<?php namespace Canducci\Weather;

use Canducci\Weather\Contracts\ICollectionCities;

class CollectionCities implements ICollectionCities {

    protected $items = array();
    protected $index = 0;

    public function __construct($xml)
    {
        $data = simplexml_load_string($xml);
        if (is_object($data) && 'SimpleXMLElement' === get_class($data))
        {
            $this->parser($data);
            $this->index = 0;
        }
        else
        {
            throw new WeatherException("Class inválid");
        }
    }

    protected function parser($data)
    {
        foreach($data as $key => $value)
        {
            array_push($this->items,
                new City(
                    (int)$value->id,
                    (string)$value->nome,
                    (string)$value->uf
                )
            );
        }
    }
    
    public function current()
    {
        return $this->items[$this->index];
    }


    public function next()
    {
        ++$this->index;
    }


    public function key()
    {
        return $this->index;
    }


    public function valid()
    {
        return ($this->index < $this->count());
    }

    public function rewind()
    {
        $this->index = 0;
    }

    public function count()
    {
        return count($this->items);
    }
}