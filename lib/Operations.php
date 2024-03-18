<?php

class Operations
{
    private function getConnection()
    {
        $databaseConf = require "databaseConf.php";

        $pdo = new PDO(
            $databaseConf["ip"],
            $databaseConf["username"],
            $databaseConf["password"]
        );
        return $pdo;
    }
    public function createData($table, $values) {
        $pdo = $this->getConnection();
        $query = 'INSERT INTO ? VALUES (?)';
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(1, $table, PDO::PARAM_STR);
        $stmt->bindParam(2, $values, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function readAllData($column, $table) {
        $pdo = $this->getConnection();
        $query = "SELECT ? FROM logininfo;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(1, $column, PDO::PARAM_STR);
        $stmt->bindParam(2, $table, PDO::PARAM_STR);
        var_dump($stmt);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;   
    }

    public function readData($column, $table, $rowMatch, $values) {
        $pdo =  $this->getConnection();
        $query = "SELECT ? FROM ? WHERE ?=?";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(1,$column, PDO::PARAM_STR);
        $stmt->bindParam(2,$table,PDO::PARAM_STR);
        $stmt->bindParam(3,$rowMatch,PDO::PARAM_STR);
        $stmt->bindParam(4,$values,PDO::PARAM_STR|PDO::PARAM_INT);   // Found this from https://www.php.net/manual/en/pdostatement.bindparam.php in example #3
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    public function updateData($table, $column, $newValue, $changeColumns, $rows) {
        $pdo = $this->getConnection();
        $query = "UPDATE ? SET ?=? WHERE ?=?";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(1, $table, PDO::PARAM_STR);
        $stmt->bindParam(2, $column, PDO::PARAM_STR);
        $stmt->bindParam(3, $newValue, PDO::PARAM_STR|PDO::PARAM_INT);
        $stmt->bindParam(4, $changeColumns, PDO::PARAM_STR);
        $stmt->bindParam(5, $rows, PDO::PARAM_STR|PDO::PARAM_INT);
        $stmt->execute();
    }

    public function deleteData($table, $column, $rows) {
        $pdo = $this->getConnection();
        $query = "DELETE FROM ? WHERE ?=?";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(1, $table, PDO::PARAM_STR);
        $stmt->bindParam(2, $column, PDO::PARAM_STR);
        $stmt->bindParam(3, $rows, PDO::PARAM_STR|PDO::PARAM_INT);
    }

}