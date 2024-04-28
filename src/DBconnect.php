<?php
    function DBconnect() {
        require 'config.php'; //access the login values

        try {
            return new PDO($dsn, $username, $password);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
?>