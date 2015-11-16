<?php namespace Canducci\Weather;

use Canducci\Weather\Contracts\IWeatherClient;

class WeatherClient implements IWeatherClient {


	public function __construct()
	{

	}

	public function download($address)
    {
        try
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $address);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $data = curl_exec($ch);
            curl_close($ch);
            return $data;
        }
        catch(\Exception $ex)
        {
            throw new WeatherException('WebClient Error', 0, $ex);
        }
    }
}

