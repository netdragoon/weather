<?php namespace Canducci\Weather;

abstract class Parse
{
    public static function toDate($value, $format = "Y-m-d")
    {
        return date_create_from_format($format, $value);
    }

}