<?php namespace Canducci\Weather\Contracts;

interface IForecast {
	public function getId();
	public function getCity();
	public function getUf();
	public function getUpdated();
	public function getDates();
	public function getArray();
	public function getJson();
}