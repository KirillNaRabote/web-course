<?php

namespace App\Module\Survey;

class SurveyFileStorage
{
    public function getSurvey(string $email): Survey
    {
        $content[0] = 'Ошибка: файла с таким именем не существует.';
        $content[1] = '';
        $content[2] = '';
        $content[3] = '';
        if (file_exists('data/' . $email . '.txt'))
        {
            $content = file('data/' . $email . '.txt');
        }
        return new Survey($content[0], $content[1], $content[2], $content[3]);
    }

    public function saveSurvey(Survey $survey): void
    {
        if ($survey->getEmail())
        {
            $fileName = 'data/' . $survey->getEmail() . '.txt';
            if (file_exists($fileName))
            {
                $content = file($fileName);
                if ($survey->getFirstName())
                {
                    $content[1] = 'First name: ' . $survey->getFirstName() . PHP_EOL;
                }
                if ($survey->getLastName())
                {
                    $content[2] = 'Last name: ' . $survey->getLastName() . PHP_EOL;
                }
                if ($survey->getAge())
                {    
                    $content[3] = 'Age: ' . $survey->getAge();
                }
                file_put_contents($fileName, join($content));
            }
            else
            {
                $fileMode = fopen($fileName, 'w');
                fwrite($fileMode, 'Email: ' . $survey->getEmail() . PHP_EOL);
                fwrite($fileMode, 'First name: ' . $survey->getFirstName() . PHP_EOL);
                fwrite($fileMode, 'Last name: ' . $survey->getLastName() . PHP_EOL);
                fwrite($fileMode, 'Age: ' . $survey->getAge() . PHP_EOL);
                fclose($fileMode);
            }
        }
    } 
}