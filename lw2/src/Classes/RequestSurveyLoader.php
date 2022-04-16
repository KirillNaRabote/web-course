<?php

namespace App\Classes;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RequestSurveyLoader extends AbstractController
{
    function data(): Survey
    {
        $email = $_GET["email"] ?? "";
        $firstName = $_GET["first_name"] ?? "";
        $lastName = $_GET["last_name"] ?? "";
        $age = $_GET["age"] ?? ""; 
        return new Survey($email, $firstName, $lastName, $age);  
    }   
}