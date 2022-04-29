<?php

namespace App\Http\Services;

use App\Http\Services\ConversorService;

class GeneratorService
{
    private $conversorService;

    public function __construct(ConversorService $conversorService)
    {
        $this->conversorService = $conversorService;
    }

    private function generateRandomString($pos)
    {
        $length = $pos > 0 ? rand(2, 10) : 4;

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(1, $charactersLength - 1)];
        }

        return $randomString;
    }

    public function generateArray($pos)
    {
        $array = array();
        $elem = $pos > 0 ? rand(2, 7) : 3;
        
        for ($i = 0; $i < $elem; $i++) {
            $string = $this->generateRandomString($pos);

            $array[$string] = $i;
        }

        return $array;
    }

    public function handle($pos)
    {
        if ($pos == 0) {
            $arrayStr = $this->generateArray($pos);

            foreach ($arrayStr as $key => $value) {
                $arrayStr[$key] = $this->conversorService->convertString($key);
            }

            return $arrayStr;
        } 

        $firstRand = rand(0, 50);
        $secondRand = rand(0, 50);

        if ($firstRand % 2 == 0) {
            $arrayStr = $this->generateArray($pos);

            if ($secondRand % 2 == 0)  {
                foreach ($arrayStr as $key => $value) {
                    $arrayStr[$key] = $this->conversorService->convertString($key);
                }
            } else {
                foreach ($arrayStr as $key => $value) {
                    $arrayStr[$key] = $this->conversorService->rot13($key);
                }
            }

            return $arrayStr;
        } else {
            $str = $this->generateRandomString($pos);

            if ($secondRand % 2 == 0)  {
                return array (
                    $str => $this->conversorService->convertString($str)
                );

            } else {
                return array (
                    $str => $this->conversorService->rot13($str)
                );
            }
        }
    }
}