<?php namespace Canducci\Weather\Contracts;

interface IForecast {
	public function getCity();
	public function getUf();
	public function getUpdated();
	public function getDates();
}