<?php

header("Content-Type: text/plain");
require_once('src/common.inc.php');
$survey = new RequestSurveyLoader;
$fileData = $survey->data();
$fileStorage = new SurveyFileStorage;
$file = $fileStorage->saveFile($fileData);
SurveyPrinter::printInfo($fileData);