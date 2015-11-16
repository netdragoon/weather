<?php namespace Canducci\Weather;

use Canducci\Weather\Contracts\IWeather;
use Canducci\Weather\Contracts\IWeatherClient;

class Weather implements IWeather {

    protected $client = null;

    const citiesUrl = "http://servicos.cptec.inpe.br/XML/listaCidades?city={0}";
    const city4DaysUrl = "http://servicos.cptec.inpe.br/XML/cidade/{0}/previsao.xml";
    const city7DaysUrl = "http://servicos.cptec.inpe.br/XML/cidade/7dias/{0}/previsao.xml";

    public function __construct(IWeatherClient $client)
    {
        $this->client = $client;
    }

    public function cities($name)
    {
        $xml = $this->client->download(str_replace("{0}",urlencode($name), self::citiesUrl));
        return new CollectionCities($xml);
    }
}