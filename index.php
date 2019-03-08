<?php
require 'vendor/autoload.php';
require 'controller/MeasureController.php';
require 'controller/ApiController.php';
require 'inc/config.inc.php';

//global $config;
//$router = new Router();
//$router->routeRequest();

if ($_GET['w'] == 'dt') {
    $measureController = new MeasureController();
    $apiController = new ApiController();
    $api = $apiController->getApiMeasures();
    $measureController->displayLatestMeasure();

}

if ($_GET['w'] == 'h') {
    $measureController = new MeasureController();
    $measureController->displayAllMeasures();
}
