<?php
class readProducts {
	function readData($column) {
		$databaseCon = require 'DatabaseConnection.php';
		$databaseConObj = new databaseCon();
	    $pdo = $databaseConObj->getConnection();
	    $query = "SELECT ? FROM product;";
	    $stmt = $pdo->prepare($query);
	    $stmt->bindParam(1, $column, PDO::PARAM_STR);
	    $stmt->execute();
	    $data = $stmt->fetchAll();
	    return $data;
	}
}
?>