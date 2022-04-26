<?php

namespace App\Services;

use App\Interfaces\TestConverter;

class TestConverterRot implements TestConverter
{
    /**
     * {@inheritDoc}
     * @see \App\Interfaces\TestConverter::convert()
     */
    public function convert($input_array){
        //Rot-13 each row seperately
        $result_array = array();
        foreach($input_array AS $row){
            $result_array[$row]= str_rot13($row);
        }
        
        return $result_array;
    }

    
}
