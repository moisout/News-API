<?php
$config = include 'config.inc.php';

// Verbindung zur DB herstellen
class Newsportal
{
    var $connection;

    public function dbConnection()
    {
        global $config;
        global $connection;

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
        global $connection;

        $query = 'SELECT * FROM `sources`';
        $result = $connection->query($query);

        if (!$result) {
            return false;
        }

        if (is_bool($result)) {
            return $result;
        }

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getCategories()
    {
        global $connection;

        $query = 'SELECT * FROM `categories`';
        $result = $connection->query($query);

        if (!$result) {
            return false;
        }

        if (is_bool($result)) {
            return $result;
        }

        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
