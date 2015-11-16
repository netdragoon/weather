<?php namespace Canducci\Weather\Contracts;

interface ICollectionCities extends IBaseCollection
{
	public function getJson();
	public function getArray();
}