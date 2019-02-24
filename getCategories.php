<?php
include 'newsportal.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$method = $_SERVER['REQUEST_METHOD'];

$newsportal = new Newsportal();

$con = $newsportal->dbConnection();

if (!$con) {
    http_response_code(500);
} else {
    switch ($method) {
        case "GET":
            if (!$newsportal->getCategories()) {
                http_response_code(500);
            } else {
                echo json_encode($newsportal->getCategories());
                http_response_code(200);
            }
            break;

        case "PUT":
            # code...
            break;

        case "POST":
            # code...
            break;

        case "DELETE":
            # code...
            break;

        default:
            break;
    }
}
