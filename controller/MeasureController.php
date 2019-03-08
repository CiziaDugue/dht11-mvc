<?php
use Dht11\Dht11_mvc\Model\MeasureManager;
use Dht11\Dht11_mvc\Model\ApiManager;
use Dht11\Dht11_mvc\Domain\Measure;

class MeasureController {

    public function displayLatestMeasure() {
        $measureManager = new MeasureManager();
        $latestMeasure = $measureManager->getLatestMeasure();

        $bargraphHeight = 161 + $latestMeasure->getTemperature() * 4;
        $bargraphTop = 315 - $latestMeasure->getTemperature() * 4;

        $apiManager = new ApiManager();
        $api = $apiManager->getApiMeasures();
        
        require 'view/measureView.php';
    }

    public function displayAllMeasures() {

        $measureManager = new MeasureManager();
        $allMeasures = $measureManager->getAllMeasures();

        require 'view/histoView.php';
    }


}
