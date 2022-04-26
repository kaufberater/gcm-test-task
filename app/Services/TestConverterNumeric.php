<?php

namespace App\Services;

use App\Interfaces\TestConverter;

class TestConverterNumeric implements TestConverter
{
    /**
     * {@inheritDoc}
     * @see \App\Interfaces\TestConverter::convert()
     */
    public function convert($input_array){
        //Convert each input row seperately
        $result_array = array();
        foreach($input_array AS $row){
            $result = "";
            //WARNING: This will not end well if we ever move out of [a-z] and into UTF-8. ord() is only for ascii chars
            for($i=0;$i<strlen($row);$i++){
                $char = substr($row, $i,1);
                //If the char seems to be an int, keep it. Otherwise cast to the ascii map with ord() and subtract the map offset of 96 for "a"
                $converted = ((int)$char == $char) ? $char : ord($char)-96;
                $result .= $converted;
            }
            $result_array[$row] = $result;
        }
        
        return $result_array;
    }

    
}
