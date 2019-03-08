<?php
require 'vendor/autoload.php';
require 'controller/MeasureController.php';
require 'inc/config.inc.php';

//global $config;
//$router = new Router();
//$router->routeRequest();

if ($_GET['w'] == 'dt') {
    $measureController = new MeasureController();
    $measureController->displayLatestMeasure();
}
