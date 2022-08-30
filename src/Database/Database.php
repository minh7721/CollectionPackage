<?php
namespace MinhHN\Collection\Database;

use PDO;
use PDOException;

class Database
{
    public function connect($host, $user_name, $pass, $db_name){
        try {
            $connect = "mysql:host=".$host.";dbname=".$db_name.";charset=utf8";
            $pdo = new PDO($connect, $user_name, $pass);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

}