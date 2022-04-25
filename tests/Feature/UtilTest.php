<?php

namespace Tests\Feature;

use App\GCMLib\UtilDirector;
use Tests\TestCase;

class UtilTest extends TestCase
{
    /**
     * Test Request to url '/'
     *
     * @return void
     */
    public function test_request()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /**
     * Test function generateRandomString(int $length)
     *
     *  @return void
     */
    public function test_generate_random_string(){
        $util = new UtilDirector();
        $arrayValues = [];
        $count = 0;
        $exist = false;
        while ($count < 1000){
            $length = rand(1,10);
            $strValue = $util->generateRandomString($length);
            self::assertIsString($strValue);
            self::assertCount($length, str_split($strValue));
            $count++;
        }
    }

    /**
     * Test function generateRandomMatrixString(int $lengthItem, int $lengthMatrix)
     *
     * @return void
     */
    public function test_generate_random_matrix_string(){
        $util = new UtilDirector();
        $arrayValues = [];
        $count = 0;
        while ($count < 1000){
            $lengthItem = rand(1,10);
            $lengthMatrix = rand(1,10);
            $arrayString = $util->generateRandomMatrixString($lengthItem, $lengthMatrix);
            self::assertCount($lengthMatrix + 1, $arrayString);
            foreach ($arrayString as $key => $value){
                self::assertIsString($value);
                self::assertCount($lengthItem, str_split($value));
            }
            $count++;
        }
    }

    /**
     * Test function convertStringToNumber(string $string)
     *
     * @return void
     */
    public function test_convert_string_to_number(){
        $util = new UtilDirector();
        $strInput = 'abcdefghijklmnopq';
        $strAssertOutput = '1234567891011121314151617';
        $result = $util->convertStringToNumber($strInput);
        self::assertEquals($strAssertOutput , $result);
    }

    /**
     * Test function convertStringROT13(string $string)
     *
     * @return void
     */
    public function test_convert_string_rot13(){
        $util = new UtilDirector();
        $strInput = 'abcdefghijklm';
        $strAssertOutput = 'nopqrstuvwxyz';
        $result = $util->convertStringROT13($strInput);
        self::assertEquals($strAssertOutput , $result);
    }
}
