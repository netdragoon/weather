<?php namespace Canducci\Weather;

class Parse
{
    public static function toDate($value, $format = "Y-m-d")
    {
        return date_create_from_format($format, $value);
    }

    public static function withoutAccents($value)
    {

		 return strtr(utf8_decode($value), 
		 			  utf8_decode("áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ"), 
		 		      utf8_decode("aaaaeeiooouucAAAAEEIOOOUUC"));
    }

    public static function encoded($value)
    {
    	return urlencode($value);
    }

    public static function normalize($value)
    {
    	$value = self::withoutAccents($value);        
        $value = self::encoded($value);        
        return $value;
    }
}