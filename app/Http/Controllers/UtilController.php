<?php

namespace App\Http\Controllers;


use App\GCMLib\UtilDirector;

class UtilController extends Controller
{

    protected  $utilDirector;

    public function __construct()
    {
        $this->utilDirector = new UtilDirector();
    }

    public function index()
    {
        for ($i = 0; $i < 10; $i++) {
            $randomLengthString = rand(1, 10);
            $randomLengthMatrix = rand(0, 10);

            $randomGenerator = rand(0, 1);
            $randomConverter = rand(0, 1);

            $generatedValue = null;
            switch ($randomGenerator) {
                case 1:
                    $generatedValue = $this->utilDirector->generateRandomString($randomLengthString);
                    break;
                case 0:
                    $generatedValue = $this->utilDirector->generateRandomMatrixString($randomLengthString, $randomLengthMatrix);
                    break;
            }

            $convertedValue = null;
            switch ($randomConverter) {
                case 1:
                    if (is_array($generatedValue)) {
                        $arrayConverted = [];
                        foreach ($generatedValue as $item) {
                            $value = $this->utilDirector->convertStringToNumber($item);
                            array_push($arrayConverted, [$item => $value]);
                        }
                        $convertedValue = $arrayConverted;
                    } else {
                        $convertedValue = $this->utilDirector->convertStringToNumber($generatedValue);
                    }
                    break;
                case 0:
                    if (is_array($generatedValue)) {
                        $arrayConverted = [];
                        foreach ($generatedValue as $item) {
                            $value = $this->utilDirector->convertStringROT13($item);
                            array_push($arrayConverted, [$item => $value]);
                        }
                        $convertedValue = $arrayConverted;
                    } else {
                        $convertedValue = $this->utilDirector->convertStringROT13($generatedValue);
                    }
                    break;
            }


            echo '<pre>';
            if (is_array($convertedValue)) {
                foreach ($convertedValue as   $value){
                    foreach ($value as $key => $value){
                        echo $key  . ' -> ' . $value . '<br>';
                    }
                }
            } else {
                echo $generatedValue  . ' -> ' . $convertedValue . '<br>';
            }
            echo '</pre>';
        }
    }


}
