<?php
	// if there is no session active, start session
	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}

	// if the user is not logged in, send them back to the login page
	if (!$_SESSION['Active']){
		header("Location: login.php");
		exit;
	}
?>

<?php 
	// function for showing entries from table
	function ReadAll($table) {
		require_once "../src/DBconnect.php";

		$query = sprintf("SELECT * FROM %s;", escape($table));

		$statement = $connection->prepare($query);
		$statement->execute();
		return $statement->fetchAll();
	}
?>

<?php
	// adding the header to the top of the page
	require '../layout/header.php';
?>
<!-- stylesheet -->
<link rel="stylesheet" type="text/css" href="../CSS/index.css">

<!-- div class to centre page contents -->
<div class="main-content" align="center">
	<!-- header for display -->
	<h1 style="font-family:sans-serif;">Products</h1> 
	<!-- form -->
	<form method="POST" action="index.php">
		<!-- button for adding products to cart -->
		<input type="submit" name="sendToCart" value="Add to Cart">
	</form>
</div>

<?php
	// adding the footer to the page
	require '../layout/footer.php';
?>