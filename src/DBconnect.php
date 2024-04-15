<?php
require_once 'lib/CRUD Operations/databaseConf.php'; //access the login values
try {
    $connection = new PDO($id, $username, $password);
    echo 'DB connected';
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>