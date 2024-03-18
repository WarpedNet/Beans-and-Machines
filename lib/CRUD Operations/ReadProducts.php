<?php
require 'DatabaseConnection.php';
class readProducts extends databaseCon {
	function readData($column) {
		$databaseConObj = new databaseCon();
	    $pdo = $databaseConObj->getConnection();
	    $query = 'SELECT * FROM product';
	    $stmt = $pdo->prepare($query);
	    $stmt->execute();
	    $data = $stmt->fetchAll();
	    return $data;
	}
}
?>