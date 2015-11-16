<?php namespace Canducci\Weather;

use Canducci\Weather\Contracts\IForecast;

class Forecast implements IForecast {

    protected $id;
    protected $city;
    protected $uf;
    protected $updated;
    protected $dates = array();

    public function __construct($xml, $id)
    {
        $data = simplexml_load_string($xml);
        if (is_object($data) && 'SimpleXMLElement' === get_class($data))
        {
            $this->id = $id;
            $this->city = (string)$data->nome;
            $this->uf = (string)$data->uf;
            $this->updated = Parse::toDate((string)$data->atualizacao);
            $this->dates = new CollectionDates($data);
        }
        else
        {
            throw new Exception("Class inválid");
        }
    }

    public function getId()
    {
        return $this->id;
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

    public function getArray()
    {
        $forecast = $this;
        $arr = array();
        foreach($forecast->getDates() as $date)
        {
            array_push($arr,
                array(
                    'Date' => array(
                        'Short' => $date->getDate()->format('d/m/Y'),
                        'Date' => $date->getDate()
                    ),
                    'Iuv' => (double)$date->getIuv(),
                    'Min' => $date->getMin(),
                    'Max' => $date->getMax(),
                    'Time' => array(
                        'Sigla' => $date->getTime()->getSigla(),
                        'Description' => $date->getTime()->getDescription()
                    )
                ));
        }
        return array(
            'Id' => $forecast->getId(),
            'City' => $forecast->getCity(),
            'Uf' => $forecast->getUf(),
            'Update' => array(
                'Short' => $forecast->getUpdated()->format('d/m/Y'),
                'Date' => $forecast->getUpdated()
            ),
            'Dates' => $arr
        );
    }
    public function getJson()
    {
        return json_encode($this->getArray(), JSON_PRETTY_PRINT);
    }
}