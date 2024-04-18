<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!$_SESSION['Active']){
	header("Location: login.php");
	exit;
}
?>

<?php 
	function ReadAll($table) {
		require_once "../src/DBconnect.php";

		$query = sprintf("SELECT * FROM %s;", escape($table));

		$statement = $connection->prepare($query);
		$statement->execute();
		return $statement->fetchAll();
	}
?>

<?php require '../layout/header.php'; ?>
<link rel="stylesheet" type="text/css" href="../CSS/index.css">
<div class="main-content" align="center">
	<h1 style="font-family:sans-serif;">Products</h1>
	<form method="POST" action="index.php">

		<input type="submit" name="sendToCart" value="Add to Cart">
	</form>
</div>

<?php require '../layout/footer.php'; ?>