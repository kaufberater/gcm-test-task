<?php

namespace App\Http\Controllers;

use App\Http\Services\ConversorService;
use App\Http\Services\GeneratorService;

class TestController extends Controller
{
    private $generator;

    public function __construct()
    {
        $this->conversorService = new ConversorService();
        $this->generator = new GeneratorService($this->conversorService);
    }

    public function show()
    {
        return view('test')->with('data', $this->generate());
    }

    private function generate()
    {
        $result = array();
        
        for ($i=0; $i<10; $i++){
            $result[] = $this->generator->handle($i);
        }

        array_unshift($result,"");
        unset($result[0]);

        return $result;
    }

}
