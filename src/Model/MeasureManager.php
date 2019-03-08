<?php
namespace Dht11\Dht11_mvc\Model;

use Dht11\Dht11_mvc\Domain\Measure;

class MeasureManager extends DBManager {

    public function setMeasure(Measure $measure){

        $req = $this->db->prepare('INSERT INTO releves_dht11(temperature, humidite) VALUES (:temperature, :humidite)');

        $req->execute(array(
            'temperature' => $measure->getTemperature(),
            'humidite' => $measure->getHumidite()
        ));

        $id = $this->db->lastInsertId();

        $measure->setId($id);

        return $id;
    }

    public function getAllMeasures() {

        $req = $this->db->query('SELECT * FROM releves_dht11 ORDER BY datetime');

        $allMeasures = array();

        while($row = $req->fetch()){
            $data = [
                'id'=>$row['id'],
                'temperature'=>$row['temperature'],
                'humidite'=>$row['humidite'],
                'datetime'=>$row['datetime']
            ];
            $measure = new Measure($data);
            array_push($allMeasures,$measure);
        }
        return $allMeasures;
    }

    public function getLatestMeasure() {

        $req = $this->db->query('SELECT id, temperature, humidite, datetime FROM releves_dht11 ORDER BY datetime DESC LIMIT 1');

        $row = $req->fetch();

        $data = [
            'id'=>$row['id'],
            'temperature'=>$row['temperature'],
            'humidite'=>$row['humidite'],
            'datetime'=>$row['datetime']
        ];

        $latestMeasure = new Measure($data);

        return $latestMeasure;
    }

    public function updateMeasure(Measure $measure){

        $req = $this->db->prepare('UPDATE releves_dht11 SET temperature = :temperature, humidite = :humidite WHERE id = :id');

        $req->execute(array(
            'temperature' => $measure->getTemperature(),
            'humidite' => $measure->getHumidite(),
            'id' => $measure->getId()
        ));
    }

    public function deleteMeasure($measureId) {

        $req = $db->prepare('DELETE FROM releves_dht11 WHERE id = :id LIMIT 1');

        $req->execute(array('id' => $measureId));

    }
}
