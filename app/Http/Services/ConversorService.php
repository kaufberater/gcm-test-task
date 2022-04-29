<?php

namespace app\Http\Services;

class ConversorService
{
    public function convertString($string)
    {
        $length = strlen($string);
        $converted = "";

        $alphabet = range('a', 'z');
        array_unshift($alphabet,"");
        unset($alphabet[0]);

        for ($i=0; $i < $length; $i++) {
            $char = $string[$i];
            $number = is_numeric($char) ? $char : array_search(strtolower($char), $alphabet);
            $converted = $converted . $number;
        }

        return $converted;
    }

    public function rot13($string)
    {
        return str_rot13($string);
    }
}