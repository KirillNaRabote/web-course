<?php

class SurveyPrinter
{
    static public function printInfo(Survey $fileData): void
    {
        if (file_exists('data/' . $fileData->getEmail() . '.txt'))
        {
            readfile('data/' . $fileData->getEmail() . '.txt');
        }
    }
}