<?php
// requires database connection
require 'DatabaseConnection.php';
class readProducts extends databaseCon {
	// function for displaying the data
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