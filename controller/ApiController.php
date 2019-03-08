<?php
use Dht11\Dht11_mvc\Model\ApiManager;

class ApiController {

    public function getApiMeasures() {
        $apiManager = new ApiManager();
        $api = $apiManager->getApiMeasures();
        return $api;
    }
}
