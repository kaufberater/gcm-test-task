<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Http\Services\ConversorService;

class ConversorTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testConvertString()
    {
        $conversorService = new ConversorService();

        $string1 = 'abcd';
        $string2 = '8a55';
        $string3 = 'fa12';

        $expected1 = 1234;
        $expected2 = 8155;
        $expected3 = 6112;

        $result1 = $conversorService->convertString($string1);
        $result2 = $conversorService->convertString($string2);
        $result3 = $conversorService->convertString($string3);

        $this->assertEquals($result1, $expected1);
        $this->assertEquals($result2, $expected2);
        $this->assertEquals($result3, $expected3);
    }

    public function testRot13()
    {
        $conversorService = new ConversorService();
        
        $string1 = 'Jul qvq gur puvpxra pebff gur ebnq?';
        $string2 = 'Gb trg gb gur bgure fvqr!';
        $string3 = 'Jung?';

        $expected1 = 'Why did the chicken cross the road?';
        $expected2 = 'To get to the other side!';
        $expected3 = 'What?';

        $result1 = $conversorService->rot13($string1);
        $result2 = $conversorService->rot13($string2);
        $result3 = $conversorService->rot13($string3);

        $this->assertEquals($result1, $expected1);
        $this->assertEquals($result2, $expected2);
        $this->assertEquals($result3, $expected3);
    }
}
