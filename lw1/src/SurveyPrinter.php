<?php

class SurveyPrinter
{
    public function printInfo(Survey $fileData)
    {
        if (file_exists('data/' . $fileData->getEmail() . '.txt'))
        {
            readfile('data/' . $fileData->getEmail() . '.txt');
        }
        return;
    }
}