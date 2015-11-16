<?php namespace Canducci\Weather;

use Canducci\Weather\Contracts\IWeatherClient;

class WeatherClient extends IWeatherClient {


	public function __construct()
	{

	}

	public function download($address)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $address);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        //curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }
}

