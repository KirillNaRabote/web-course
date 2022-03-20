<?php

header("Content-Type: text/plain");
require('src/LoadClasses.php');
$survey = new RequestSurveyLoader;
$fileData = $survey->data();
$fileStorage = new SurveyFileStorage;
$file = $fileStorage->saveFile($fileData);
$printFile = new SurveyPrinter;
$printFile->printInfo($fileData);