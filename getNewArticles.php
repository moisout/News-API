<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$url = $_SERVER['REQUEST_URI'];
$parts = parse_url($url);
parse_str($parts['query'], $query);

$xml_data = file_get_contents($query['url']);

$cleaned_xml_data = str_replace('https://cpx.golem.de/', '" id="__no_tracking_:D__', $xml_data);

$xml = simplexml_load_string($cleaned_xml_data);
$json = json_encode($xml);
echo $json;
$array = json_decode($json, TRUE);

// echo json_encode($array);
?>