<?php
require_once 'config.php'; //access the login values

try {
    $connection = new PDO($dsn, $username, $password);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>