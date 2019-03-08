<?php
namespace Dht11\Dht11_mvc\Model;

class ApiManager extends DBManager {

    public $url = 'https://www.prevision-meteo.ch/services/json/';
    public $city = 'saint-Etienne-42';
    public $gps;

    public function getApiMeasures() {
        $api_json = file_get_contents($this->url.(!empty($this->gps)?$this->gps:$this->city));
        $api = json_decode($api_json);
        return $api;
    }
}
