<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConverterController extends Controller{

    protected $convType;
    protected $genType;
    protected $gen;
    protected $test;
    protected $alpha = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];

    public function __construct( GeneratorController $generator ){
        $this->gen = $generator;
    }

    public function convert( $data = null ){

        $response = array();
        
        if( is_null( $data ) )
            $data = $this->gen->generateRandomData( $this->genType );
        else if( $this->test == true )
            return $this->converter( $data );
        
        if( is_array( $data ) && !empty( $data ) ){
            foreach( $data as $string ){
                array_push( $response, array(
                    'original' => $string,
                    'converted' => $this->converter( $string )
                ));
            }
        }else{
            array_push( $response, array(
                'original' => $data,
                'converted' => $this->converter( $data )
            ));
        }

        return $response;
    }

    public function converter( $data ){
        $arr_ = str_split( $data );
        $result = '';
        foreach( $arr_ as $char ){
            if( $this->convType == 'alpha' )
                $result .= !is_numeric( $char ) ? (intval(array_search( strtolower($char), $this->alpha )+1)) : $char;
            else{ // rot13
                if( !is_numeric( $char ) ){
                    $index = array_search( strtolower( $char ), $this->alpha );
                    $result .= intval($index) < 13 ? $this->alpha[$index+13] : $this->alpha[$index-13];
                }else
                    $result .= $char;
            }
        } return $result;
    }

    public function setConvType( $convType ){
        $this->convType = $convType;
    }

    public function setGenType( $genType ){
        $this->genType = $genType;
    }

    public function setTest( $status ){
        $this->test = $status;
    }

    public function getConvType(){
        return $this->convType;
    }

    public function getGenType(){
        return $this->genType;
    }

    public function getTest(){
        return $this->test;
    }
}
