<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\TestConverterRot;
use App\Services\TestConverterNumeric;

class ConvertersTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRotConverter()
    {
        //Run a test vs 2 entries
        $inputString = '1abcdefghijklmnopqrstuvwxyz2';
        $reversedInputString = strrev($inputString);
        $converter = new TestConverterRot();
        $result = $converter->convert(array($inputString, $reversedInputString));
        
        
        //1. Assert we get exactly two results
        $this->assertIsArray($result, "Invalid result structure");
        $this->assertCount(2, $result, "Incorrect amount of results");
        
        foreach($result AS $key=>$row){
            //2. Assert that we only received strings
            $this->assertIsString($row, "Result contains a non-String");
        }
        
        //3. Assert that the keys are preserved
        $this->assertArrayHasKey($inputString, $result);
        $this->assertArrayHasKey($reversedInputString, $result);
        
        //4. Assert the ROT13 was succesful, based on the manual map
        $this->assertEquals('1nopqrstuvwxyzabcdefghijklm2', $result[$inputString], "Invalid ROT13 encoding");
        $this->assertEquals('2mlkjihgfedcbazyxwvutsrqpon1', $result[$reversedInputString], "Invalid ROT13 encoding");
    }
    
    public function testNumericConverter(){
        //Run a test vs 2 entries
        $inputString = '1a2b3c4d5e6f7g8h9i0jklmnopqrstuvwxyz';
        $reversedInputString = strrev($inputString);
        $converter = new TestConverterNumeric();
        $result = $converter->convert(array($inputString, $reversedInputString));
        
        //1. Assert we get exactly two results
        $this->assertIsArray($result, "Invalid result structure");
        $this->assertCount(2, $result, "Incorrect amount of results");
        
        foreach($result AS $key=>$row){
            //2. Assert that we only received strings
            $this->assertIsString($row, "Result contains a non-String");
        }
        
        //3. Assert that the keys are preserved
        $this->assertArrayHasKey($inputString, $result);
        $this->assertArrayHasKey($reversedInputString, $result);
        
        //4. Assert the ROT13 was succesful, based on the manual map
        $this->assertEquals('11223344556677889901011121314151617181920212223242526', $result[$inputString], "Invalid numerical encoding");
        $this->assertEquals('26252423222120191817161514131211100998877665544332211', $result[$reversedInputString], "Invalid numerical encoding");
        
    }
    
}
