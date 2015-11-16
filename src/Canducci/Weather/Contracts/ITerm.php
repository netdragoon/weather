<?php

namespace Canducci\Weather\Contracts;

interface ITerm {
    public function getSigla();
    public function getDescription();
}