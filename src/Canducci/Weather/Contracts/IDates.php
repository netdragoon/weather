<?php namespace Canducci\Weather\Contracts;

interface IDates {
    public function getDate();
    public function getIuv();
    public function getMin();
    public function getMax();
    public function getTime();
}