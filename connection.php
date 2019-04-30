<?php
class Database
{
    private static $instance = NULL;
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            $PDO_OPTIONS[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $host = 'foudb.c4desnhm2vuu.us-east-2.rds.amazonaws.com';
            $username = 'fou_admin';
            $password = 'fou_admin_db';
            $db = 'dbnamefou';
            $DSN = "mysql:host=$host;dbname=$db";
            self::$instance = new PDO($DSN, $username, $password, $PDO_OPTIONS);
        }

        return self::$instance;
    }
}




// $conn = new mysqli($host, $user, $pass, $db);
// if ($conn->connect_error) {
//     die('Connection erorr:' . $conn->connect_error);
// }

// $result = $conn->query('select * from users');
// $results = $result->fetch_all(MYSQLI_ASSOC);

// print_r($results);

// $conn->close();
