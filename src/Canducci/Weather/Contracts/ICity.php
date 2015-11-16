<?php namespace Canducci\Weather\Contracts;

interface ICity {
    public function getId();
    public function getName();
    public function getUf();
}