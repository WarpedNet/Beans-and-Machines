<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION["admin"]) == false || !$_SESSION['admin']){
	header("Location: login.php");
	exit;
}
?>

<?php
	require_once "../class/order/ProductOrder.php";
	$orderObj = new productOrder();

	if (isset($_GET["id"]) && preg_match("/\d/", $_GET["id"]) && $_GET["id"] >= 0) {
		$orderObj->getOrder($_GET["id"]);
	
		if (isset($_POST["submit"])) {
			if ($_POST["userName"] != null) {
				$orderObj->setUserName($_POST["userName"]);
			}
			if ($_POST["productName"] != null) {
				$orderObj->setProductName($_POST["productName"]);
			}
			if ($_POST["quantity"] != null) {
				$orderObj->setQuantity($_POST["quantity"]);
			}
			$orderObj->updateOrder($_GET["id"]);
			header("Location: orders.php");
			exit();
		}
	}
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
    <header>
        <span class="title-left">
            <!-- logo image -->
            <img src="../Images/ChangeMe.jpg", width=150vw>
            <strong>Beans and Machines</strong>
            <p class="title-links"><a href="../public/index.php">Products</a> | <a href="aboutUs.php">About Us</a> | <a href="contact.php">Contact</a> <?php echo (isset($_SESSION["admin"]) && $_SESSION["admin"] ? " | <a href='admin.php'>Admin</a>" : null); ?></p>
        </span>
        <span class="title-right">
            <!-- cart button -->
            <div class="title-buttons">
                <button onclick="location.href='cart.php'"><img src="../Images/Icons/cart.png", width=50vw></button>
                <p>Cart</p>
            </div>
            <!-- login button -->
            <div class="title-buttons">
                <?php if (isset($_SESSION["Active"]) && $_SESSION["Active"] = true) { ?>
                    <button onclick="location.href='../public/logout.php'"><img src="../Images/Icons/login.png", width=50vw></button>
                    <p>Log Out</p>  

                    <?php } else { ?>
                         <button onclick="location.href='login.php'"><img src="../Images/Icons/login.png", width=50vw></button> 
                         <p>Log In</p>
                         
                    <?php } ?>
            </div>
        </span>
    </header>

	<div class="main-content" align="center">
		<h1 style="font-family:sans-serif;">Edit Order</h1>
		<form method="POST">
			<label for="userName">User Name</label>
			<input type="text" name="userName" id="userName" placeholder="<?php echo $orderObj->getUserName(); ?>">
			<label for="productName">Product Name</label>
			<input type="text" name="productName" id="productName" placeholder="<?php echo $orderObj->getProductName(); ?>">
			<label for="quantity">Quantity</label>
			<input type="number" name="quantity" id="quantity" placeholder="<?php echo $orderObj->getQuantity(); ?>">
			<button type="submit" name="submit" value="Update Order">Update Order</button>
		</form>
	</div>
</body>

<?php
	// adding the footer to the page
	require '../layout/footer.php';
?>