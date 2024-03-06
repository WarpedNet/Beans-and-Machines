<?php

function connection() {
	$databaseConf = require "databaseConf.php";

	$pdo = new PDO(
		$databaseConf["ip"],
		$databaseConf["username"],
		$databaseConf["password"]
	);

	return $pdo;
}

function getData() {
	$query = 'SELECT * FROM product';
	$pdo = connection();
	$stmt = $pdo->prepare($query);
	$stmt->execute();
	$data = $stmt->fetchAll();
	return $data;
}
?>