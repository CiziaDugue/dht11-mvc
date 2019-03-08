<?php
namespace Dht11\Dht11_mvc\Model;

class DBManager {
    
    protected $db;
    
    public function __construct() {
        try {
            //$this->db = new \PDO('mysql:host='.$config['host'].';dbname='.$config['dbname'].';charset=utf8', $config['dbuser'], $config['dbpassword']);
            $this->db = new \PDO('mysql:host=localhost;dbname=dht11;charset=utf8', 'dht11', 'etg?45èàg41M(jsg!D');
        }
        catch(\Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }
    
    public function  createDb() {
        try {
            $this->db = new \PDO('mysql:host='.$config['host'].';', $config['dbuser'], $config['dbpassword']);
        }
        catch(\Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
        $req = $this->db->prepare('CREATE DATABASE IF NOT EXISTS '.$config['dbname'].'
							CHARACTER SET utf8 COLLATE utf8_general_ci');
        $req->execute();
    }
    
    public function createTable() {
        try {
            $this->db = new \PDO('mysql:host='.$config['host'].';dbname='.$config['dbname'].';charset=utf8', $config['dbuser'], $config['dbpassword']);
        }
        catch(\Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
        $req = $this->db->prepare(
            'CREATE TABLE IF NOT EXISTS `releves_dht11`(
                  `id` smallint(5) AUTO_INCREMENT NOT NULL,
                  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                  `temperature` tinyint NOT NULL,
                  `humidite` tinyint NOT NULL,
                  PRIMARY KEY (`id`),
                  UNIQUE KEY `datetime` (`datetime`)
             ) ENGINE=InnoDB DEFAULT CHARSET=utf8'
        );
        $req->execute();
    }
    
    public function disconnect() {
        $this->db = NULL;
    }
}