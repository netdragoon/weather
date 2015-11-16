<?php namespace Canducci\Weather\Contracts;

interface IWeatherClient {
	public function download($address);
}
