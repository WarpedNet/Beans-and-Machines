<?php

class Operations
{
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
    private function readData($column, $table)
    {
        $pdo =  $this->getConnection();
        $query = "SELECT ? FROM ?";
        $stmt = $pdo ->prepare($query);
        $stmt->bindParam(1,$column, PDO::PARAM_STR);
        $stmt->bindParam(2,$table,PDO::PARAM_STR);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
        
    }

}