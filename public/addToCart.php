<?php
	// starting the session
	session_start();

	// if the user is not logged in, send them to the login page
	if (!$_SESSION['Active']){
	    header("Location: login.php");
	    exit;
	}
?>

<?php
	// adding the header to the top of the page
	require '../layout/header.php';
?>

<!-- stylesheet -->
<link rel="stylesheet" type="text/css" href="../CSS/index.css">
<!-- div for aligning contents to centre -->
<div class="main-content" align="center">
	<h1 style="font-family:sans-serif; color:red"><?php if(isset($_POST["sendToCart"])) {echo "Added to Cart!";}?></h1>
	<h1 style="font-family:sans-serif;">Products</h1>
	<form method="POST" action="index.php">
		<!-- button for submitting -->
		<input type="submit" name="sendToCart" value="Add to Cart">
	</form>
</div>

<?php
	// adding a footer to the bottom of the page
	require '../layout/footer.php';
?>