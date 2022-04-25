<?php

namespace App\GCMLib;

class UtilDirector
{

    /**
     * Generate a random string of a-z0-9
     *
     * @param int $length
     * @return string
     */
    public function generateRandomString(int $length = 10): string
    {
        $characters = implode("", array_merge(range('a', 'z'), range(0, 9)));
        $randstring = '';
        while (strlen($randstring) < $length) {
            $randstring .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randstring;
    }

    /**
     * Generate an array of random strings from a-z0-9
     *
     * @param int $lengthItem
     * @param int $lengthMatrix
     * @return array
     */
    public function generateRandomMatrixString(int $lengthItem = 5, int $lengthMatrix = 5): array
    {
        $arrayRandomString = array();
        for ($i = 0; $i < ($lengthMatrix + 1); $i++) {
            $generatedStringItem = $this->generateRandomString($lengthItem);
            array_push($arrayRandomString, $generatedStringItem);
        }
        return $arrayRandomString;
    }

    /**
     * Convert strings to numeric equivalents based on character position in the alphabet
     *
     * @param string $string
     * @return string
     */
    public function convertStringToNumber(string $string): string
    {
        $string = strtolower($string);
        $convertedString = '';
        $alphabet = range('a', 'z');
        for ($i = 0; $i < strlen($string); $i++) {
            if (!is_numeric($string[$i])) {
                $convertedString .= array_search($string[$i], $alphabet) + 1;
            } else {
                $convertedString .= $string[$i];
            }
        }
        return $convertedString;
    }

    /**
     * Convert strings using the ROT13 converter
     *
     * @param string $string
     * @return string
     */
    public function convertStringROT13(string $string): string
    {
        $string = strtolower($string);
        $alphabet = range('a', 'z');
        $collection = collect(str_split($string))->map(function ($char) use ($alphabet) {
            if (!is_numeric($char)) {
                $index = array_search($char, $alphabet);
                $char = $index < 13 ? $alphabet[($index + 13)] : $alphabet[($index - 13)];
            }
            return $char;
        });
        return $collection->implode("");
    }
}
