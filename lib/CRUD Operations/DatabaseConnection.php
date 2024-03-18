<?php
class databaseCon {
    function getConnection()
        {
            $databaseConf = require "databaseConf.php";

            $pdo = new PDO(
                $databaseConf["ip"],
                $databaseConf["username"],
                $databaseConf["password"]
            );
            return $pdo;
        }
}
?>