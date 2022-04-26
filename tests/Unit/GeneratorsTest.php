<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\TestGeneratorSingle;
use App\Services\TestGeneratorMultiple;

class GeneratorsTest extends TestCase
{
    /**
     * Test the TestGeneratorSingle class/get()
     *
     * @return void
     */
    public function testGeneratorSingle()
    {
        $stringLength = 20;
        $generator = new TestGeneratorSingle($stringLength);
        $result = $generator->get();
                
        //1. Assert we get a single result
        $this->assertIsArray($result, "Invalid result structure");
        $this->assertCount(1, $result, "Incorrect amount of results");
        
        //2. Assert that the result is a string
        $this->assertIsString($result[0],"Result is not a string");
        
        //3. Assert that we get as many chars as we wanted
        $this->assertEquals($stringLength, strlen($result[0]), "String length does not match");
        
        //4. Assert that the string contains only chars in the [a-z][0-9] range
        $this->assertMatchesRegularExpression('/^[a-z0-9]*$/', $result[0], "Invalid characters in the result");
        
        $this->assertTrue(true);
    }
    
    public function testGeneratorMultiple(){
        $stringLength = 20;
        $numResults = 5;
        
        $generator = new TestGeneratorMultiple($stringLength, $numResults);
        $result = $generator->get();
        
        //1. Assert that we got the expected amount of results
        $this->assertIsArray($result, "Invalid result structure");
        $this->assertCount($numResults, $result, "Incorrect amount of results");
        
        
        foreach($result AS $row){
            //2. Assert that we only received strings
            $this->assertIsString($row, "Result contains a non-String");
            //3. Assert that we get as many chars as we wanted
            $this->assertEquals($stringLength, strlen($row), "String length does not match");
            //4. Assert that the string contains only chars in the [a-z][0-9] range
            $this->assertMatchesRegularExpression('/^[a-z0-9]*$/', $row, "Invalid characters in the result");
        }
    }
    
}
