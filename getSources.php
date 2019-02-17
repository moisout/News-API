<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$url = $_SERVER['REQUEST_URI']; 
$parts = parse_url($url);
parse_str($parts['query'], $query);

$configFile = file_get_contents('data/config.json');
$config = json_decode($configFile, true);

$data = array();



?>