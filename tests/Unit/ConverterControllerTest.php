<?php

    namespace Tests\Unit;

    use PHPUnit\Framework\TestCase;
	use App\Http\Controllers\ConverterController;
	use App\Http\Controllers\GeneratorController;

    class ConverterControllerTest extends TestCase{

        public function testConvert(){
            $converter = new ConverterController( new GeneratorController );

			$converter->setConvType('alpha');
			$converter->setGenType('string');
			$converter->setTest(true);
            $this->assertEquals('1072324', $converter->convert('j7wbd'));

            $converter->setConvType('rot');
			$converter->setGenType('string');
			$converter->setTest(true);
			$this->assertEquals('u78nhun9', $converter->convert('h78auha9'));
        }
    }