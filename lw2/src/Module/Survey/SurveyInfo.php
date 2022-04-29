<?php

namespace App\Module\Survey;

class SurveyInfo
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