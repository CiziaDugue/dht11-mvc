<?php
namespace Dht11\Dht11_mvc\Test;

require '../../vendor/autoload.php';

use Dht11\Dht11_mvc\Model\MeasureManager;
use Dht11\Dht11_mvc\Domain\Measure;
use PHPUnit\Framework\TestCase as TestCase;

class MeasureManagerTest extends TestCase {
    
    private $measureManager;
    
    //Instanciation des objets à tester
    protected function setUp() {
        
        parent::setUp(); //facultatif car méthode du parent vide
        
        $this->measureManager = new MeasureManager();
    }
    
    public function testSetMeasure(){
        
        $mockData = [
            'id'=>1,
            'temperature'=>1,
            'humidite'=>1
        ];
        
        $mockMeasure = new Measure($mockData);
        
        $this->measureManager->setMeasure($mockMeasure);
        
        $mockId = $this->measureManager->db->lastInsertId();
        
        $this->assertEquals(1,$mockId);
    }
    
    public function testGetAllMeasures() {
        
        $result = $this->measureManager->getAllMeasures();
        
        $this->assertEquals(100, count($result));
    }
    
    public function testGetLatestMeasure() {
        
        $result = $this->measureManager->getLatestMeasure();
        
        $this->assertEquals(1, count($result));
    }
    
    protected function tearDown() {
        
        $this->measureManager = NULL;
        
        parent::tearDown(); //facultatif car méthode du parent vide
    }
}