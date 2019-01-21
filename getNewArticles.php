<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$url = $_SERVER['REQUEST_URI']; 
$parts = parse_url($url);
parse_str($parts['query'], $query);

$source_links = $query['urls'];

$data = array();

foreach ($source_links as $key => $value) {
    $xml_data = file_get_contents($value);

    $xml_data = str_replace('<media:', '<', $xml_data);

    $cleaned_xml_data = str_replace('https://cpx.golem.de/', '" id="__no_tracking_:D__', $xml_data);
    $xml = simplexml_load_string($cleaned_xml_data, null, LIBXML_NOCDATA);

    array_push($data, $xml);
}

echo json_encode($data);
?>