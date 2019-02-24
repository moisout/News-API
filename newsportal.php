<?php
$config = include 'config.inc.php';

// Verbindung zur DB herstellen
class Newsportal
{
    private $connection;

    public function dbConnection()
    {
        global $config;

        $con = new mysqli($config['host'], $config['user'], $config['pw'], $config['db']);
        if (!$con) {
            echo 'error asd';
            return false;
        }
        else{
            $connection = $con;
            return $con;
        }
    }

    public function sendResponse($success, $data = [], $error = "", $debug_msg = "")
    {
        echo json_encode([
            "success" => $success,
            "data" => $data,
            "error" => $error,
            "debug_msg" => $debug_msg,
        ]);
    }

    public function getSources()
    {
        $query = 'SELECT * FROM "sources"';
        $result = $connection->query($query);
        return $result;
    }
}
