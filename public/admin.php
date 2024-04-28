<?php
    // starting the session is there is no active session
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // if the user is not an admin, send them back to login
    if (isset($_SESSION["admin"]) == false || !$_SESSION['admin']){
    	header("Location: login.php");
    	exit;
    }
?>

<!-- setting the header at the top of the page -->
<?php 
    require '../layout/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../CSS/header.css">
    <link rel="shortcut icon" href="../Images/Icons/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../CSS/index.css">
	<link rel="stylesheet" type="text/css" href="../CSS/admin.css">
    <title>Beans and Machines</title>
</head>
<body>
    <!-- admin options -->
	<div class="main-content" align="center">
		<a href="productEdit.php">View / Edit Products</a>
		<br>
		<a href="userEdit.php">View / Edit Users</a>
		<br>
		<a href="orders.php">View / Edit orders</a>
	</div>
</body>

<?php
    // adding the footer to the page
    require '../layout/footer.php';
?>