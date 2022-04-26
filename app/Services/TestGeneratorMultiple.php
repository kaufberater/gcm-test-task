<?php

namespace App\Services;

class TestGeneratorMultiple extends TestGeneratorSingle
{
    protected $numRows = 0;
    
    public function __construct(int $numCharacters, int $numRows){
        $this->numRows = $numRows;
        parent::__construct($numCharacters);
    }
    
   
    /**
     * {@inheritDoc}
     * @see \App\Interfaces\TestGenerator::get()
     */
    public function get(){
        //Generate an the requested amount of single-row results
        $result_array = array_fill(0, $this->numRows, null);
        foreach($result_array AS &$result){
            $result = parent::get()[0];
        }
        unset($result);
        
        return $result_array;
    }
    
}
