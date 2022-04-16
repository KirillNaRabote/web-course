<?php

namespace App\Classes;

class SurveyPrinter
{
    static public function printInfo(Survey $fileData): array
    {
        $content = '';
        if (file_exists(realpath('public/data/') . $fileData->getEmail() . '.txt'))
        {
            $content = file(realpath('public/data/') . $fileData->getEmail() . '.txt');
        }
        return $content;
    }
}