<?php

namespace App\Classes;

use Symfony\Component\HttpFoundation\Request;

class RequestSurveyLoader
{
    public function data(Request $request): Survey
    {
        $email = $request->get("email") ?? '';
        $firstName = $request->get("first_name") ?? '';
        $lastName = $request->get("last_name") ?? '';
        $age = $request->get("age") ?? '';
        return new Survey($email, $firstName, $lastName, $age);
    }   
}