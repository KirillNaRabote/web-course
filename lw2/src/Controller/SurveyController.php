<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use App\Classes\SurveyPrinter;
use App\Classes\RequestSurveyLoader;
use App\Classes\SurveyFileStorage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SurveyController extends AbstractController
{
    /**
     * @Route("/ladno", name="ladno")
     */
    public function bebra(): Response
    {
        header("Content-Type: text/plain");
        $survey = new RequestSurveyLoader;
        $fileData = $survey->data();
        $fileStorage = new SurveyFileStorage;
        $file = $fileStorage->saveFile($fileData);
        $content = SurveyPrinter::printInfo($fileData);
        return $this->render('Response.html.twig', [
            'email' => $content[0],
            'first_name' => $content[1],
            'last_name' => $content[2],
            'age' => $content[3],
        ]);
    }
}