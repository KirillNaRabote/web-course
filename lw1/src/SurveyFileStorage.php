<?php

class SurveyFileStorage
{
    public function saveFile(Survey $fileData): void
    {
        if ($fileData->getEmail())
        {
            $fileName = 'data/' . $fileData->getEmail() . '.txt';
            if (file_exists($fileName))
            {
                $fileMode = fopen($fileName, 'r');     
                $content = file($fileName);
                if ($fileData->getFirstName())
                {
                    $content[1] = 'First name: ' . $fileData->getFirstName() . PHP_EOL;
                }
                if ($fileData->getLastName())
                {
                    $content[2] = 'Last name: ' . $fileData->getLastName() . PHP_EOL;        
                }
                if ($fileData->getAge())
                {    
                    $content[3] = 'Age: ' . $fileData->getAge();
                }
                file_put_contents($fileName, join($content));
            }
            else
            {
                $fileMode = fopen($fileName, 'w');
                fwrite($fileMode, 'email: ' . $fileData->getEmail() . PHP_EOL);
                fwrite($fileMode, 'First name: ' . $fileData->getFirstName() . PHP_EOL);
                fwrite($fileMode, 'Last name: ' . $fileData->getLastName() . PHP_EOL);
                fwrite($fileMode, 'Age: ' . $fileData->getAge() . PHP_EOL);
                fclose($fileMode);
            }
        }
        else
        {
            echo('Не введен email');
        }
    } 
}