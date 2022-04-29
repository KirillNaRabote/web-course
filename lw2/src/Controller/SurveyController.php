<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Module\Survey\SurveyInfo;
use App\Module\Survey\RequestSurveyLoader;
use App\Module\Survey\SurveyFileStorage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SurveyController extends AbstractController
{
    public function saveSurvey(Request $request): Response
    {
        $surveyLoader = new RequestSurveyLoader();
        $survey = $surveyLoader->data($request);

        $fileStorage = new SurveyFileStorage();
        $fileStorage->saveSurvey($survey);

        $email = $survey->getEmail();
        if ($email)
        {
            return $this->render('surveySave.html.twig');
        }
        else
        {
            return $this->render('surveySaveError.html.twig');
        }
    }

    public function getSurvey(Request $request): Response
    {
        $email = $request->get('email');
        if ($email === null)
        {
            $email = '';
        }

        $fileStorage = new SurveyFileStorage();
        $survey = $fileStorage->getSurvey($email);

        $content = SurveyInfo::getInfo($survey);
        return $this->render('survey.html.twig', $content);
    }
}