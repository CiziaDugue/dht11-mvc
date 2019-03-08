<?php
require 'vendor/autoload.php';
use Dht11\Dht11_mvc\Domain\Measure;

$data_json = file_get_contents('php://input');

$data = json_decode($data_json, true);

if (!$data){
	http_response_code(415);
	exit();
}
elseif (! $data['temperature'] || ! $data['humidite']){
	http_response_code(400);
	exit();
}

$newMeasure = new Measure($data);
$id = $newMeasure->save();

if (!$id) {
	http_response_code(500);
}