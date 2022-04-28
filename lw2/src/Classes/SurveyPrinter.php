<?php

namespace App\Classes;

class SurveyPrinter
{
    public static function getInfo(Survey $survey): array
    {
        return [
            'email' => $survey->getEmail(),
            'first_name' => $survey->getFirstName(),
            'last_name' => $survey->getLastName(),
            'age' => $survey->getAge(),
        ];
    }
}