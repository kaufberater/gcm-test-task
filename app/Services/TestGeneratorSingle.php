<?php

namespace App\Services;

use App\Interfaces\TestGenerator;

class TestGeneratorSingle implements TestGenerator
{
    protected $numCharacters = 0;
    
    
    //Allowed characters in results are a-z0-9
    public static $allowedCharacters = array(
        "a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z",
        "1","2","3","4","5","6","7","8","9","0"
        
    );
    
    public function __construct(int $num_characters){
        $this->numCharacters = $num_characters ? $num_characters : rand(1,10);
    }
    
   
    /**
     * {@inheritDoc}
     * @see \App\Interfaces\TestGenerator::get()
     */
    public function get(){
        //Retrieve the requested amount of random chars from the allowedCharacters array
        $result_array = array_fill(0, $this->numCharacters, null);
        $result_array = array_map(function(){
            return TestGeneratorSingle::$allowedCharacters[ array_rand(TestGeneratorSingle::$allowedCharacters) ];
        }, $result_array);
            
        //Flatten the array and return
        return array(implode('', $result_array));
    }
    
}
