<?php

namespace App\Classes;

class SurveyPrinter
{
    static public function printInfo(Survey $fileData): array
    {
        $content = '';
        if (file_exists('data/' . $fileData->getEmail() . '.txt'))
        {
            $content = file('data/' . $fileData->getEmail() . '.txt');
        }
        return $content;
    }
}