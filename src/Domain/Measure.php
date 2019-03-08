<?php
namespace Dht11\Dht11_mvc\Domain;

use Dht11\Dht11_mvc\Model\MeasureManager;

class Measure {
    
    private $id;
    private $temperature;
    private $humidite;
    private $datetime;
    
    public function __construct(array $data) {
        
        $this->hydrate($data);
    }
    
    public function hydrate(array $data) {
        
        foreach($data as $key => $value) {
            
            $method = 'set'.ucfirst($key);
            
            if (method_exists($this, $method)) {
                
                $this->$method($value);
            }
        }
    }
    
    public function getId() {
        return $this->id;
    }
    public function getTemperature() {
        return $this->temperature;
    }
    public function getHumidite() {
        return $this->humidite;
    }
    public function getDatetime() {
        return $this->datetime;
    }
    
    public function setId($id) {
        $id = (int) $id;
        if ($id >= 0) {
            $this->id = $id;
        }
    }
    public function setTemperature($temperature) {
        $this->temperature = $temperature;
    }
    public function setHumidite($humidite) {
        $this->humidite = $humidite;
    }
    public function setDatetime($datetime) {
        $this->datetime = $datetime;
    }
    
    public function save() {
        $manager = new MeasureManager();
        return $manager->setMeasure($this);
    }
    
}