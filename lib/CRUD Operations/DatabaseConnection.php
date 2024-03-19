<?php
class databaseCon {
    function getConnection()
        {
            // getting database configuration file
            $databaseConf = require "databaseConf.php";

            // creating database connection
            $pdo = new PDO(
                $databaseConf["ip"],
                $databaseConf["username"],
                $databaseConf["password"]
            );
            // return the connection
            return $pdo;
        }
}
?>