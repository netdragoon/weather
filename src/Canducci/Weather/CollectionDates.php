<?php namespace Canducci\Weather;

use Canducci\Weather\Contracts\ICollectionDates;

class CollectionDates implements ICollectionDates {

    protected $items = array();
    protected $index = 0;

    public function __construct($data)
    {
        if (!is_object($data))
        {
            $data = simplexml_load_string($data);
        }
        $this->parser($data);
    }
    
    protected function parser($data)
    {
        $terms = new Terms();
        foreach($data->previsao as $key => $value)
        {
            array_push($this->items,
                new Dates(
                    Parse::toDate((string)$value->dia),
                    (double)$value->iuv,
                    (double)$value->minima,
                    (double)$value->maxima,
                    new Term((string)$value->tempo, $terms->get((string)$value->tempo)
                )
            ));
        }
        unset($terms);
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