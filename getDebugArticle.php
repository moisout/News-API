<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$article = [
    'title' => 'This is a static Article',
    'previewtext' => 'It is used to develop and test this website. Lorem ipsum dolor sit amet consectetur adipisicing elit.
    Nesciunt quo nulla porro mollitia iure id quas, sunt deserunt eveniet?
    Sed obcaecati blanditiis ipsa ab recusandae qui accusamus nulla magnam dolores.',
    'author' => 'Maurice Oegerli',
    'pagename' => 'Test page'
];

$xml_data = file_get_contents('https://rss.golem.de/rss.php?feed=RSS2.0');

$xml = simplexml_load_string($xml_data);
$json = json_encode($xml);
$array = json_decode($json,TRUE);

echo json_encode($array);