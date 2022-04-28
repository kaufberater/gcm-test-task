<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneratorController extends Controller{

    public function generateRandomData( $type ){
        if( $type == 'string' )
            $data = $this->generateString( rand(3,8) );
        else{
            $arraySize = rand(2,4);
            $stringLength = rand(3,8);
            $data = array();
            while( count( $data ) < $arraySize ){
                array_push( $data, $this->generateString( $stringLength ) );
            }
        } return $data;
    }
    
    public function generateString( $length ){
        return substr( bin2hex( random_bytes( 4 ) ), 0, $length );
    }
}
