<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION["admin"]) == false || !$_SESSION['admin']){
	header("Location: login.php");
	exit;
}

if (isset($_POST["submit"])){
	require "../class/product/product.php";
	$productObj = new product();
	$productObj->setName($_POST["productName"]);
	$productObj->setDesc($_POST["productDesc"]);
	$productObj->setAge($_POST["productAge"]);
	$productObj->setVendor($_POST["productVendor"]);
	$productObj->setPrice($_POST["productPrice"]);
	$productObj->setStock($_POST["productStock"]);
	$productObj->sendProductToDB();
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
            <p class="title-links"><a href="../public/index.php">Products</a> | <a href="../public/aboutUs.php">About Us</a> | <a href="../public/contact.php">Contact</a> <?php echo (isset($_SESSION["admin"]) && $_SESSION["admin"] ? " | <a href='admin.php'>Admin</a>" : null); ?></p>
        </span>
        <span class="title-right">
            <!-- cart button -->
            <div class="title-buttons">
                <button onclick="location.href='../public/cart.php'"><img src="../Images/Icons/cart.png", width=50vw></button>
                <!-- <a href="cart.php"><img src="../Images/Icons/cart.png", width=50vw></a> -->
                <p>Cart</p>
            </div>
            <!-- login button -->
            <div class="title-buttons">
                <?php if (isset($_SESSION["Active"]) && $_SESSION["Active"] = true) { ?>
                    <button onclick="location.href='../public/logout.php'"><img src="../Images/Icons/login.png", width=50vw></button>
                    <p>Log Out</p>  

                    <?php } else { ?>
                         <button onclick="location.href='../public/login.php'"><img src="../Images/Icons/login.png", width=50vw></button> 
                         <p>Log In</p>
                         
                    <?php } ?>
            </div>
        </span>
    </header>

	<div class="main-content" align="center">
		<h1 style="font-family:sans-serif;">Add Product</h1>
		<form method="POST">
			<label for="productName">Product Name</label>
			<input type="text" name="productName" id="productName" required>
			<br>
			<label for="productDesc">Product Description</label>
			<input type="text" name="productDesc" id="productDesc" required>
			<br>
			<label for="productAge">Product Age</label>
			<input type="text" name="productAge" id="productAge" required>
			<br>
			<label for="productVendor">Product Vendor</label>
			<input type="text" name="productVendor" id="productVendor" required>
			<br>
			<label for="productPrice">Product Price</label>
			<input type="text" name="productPrice" id="productPrice" required>
			<br>
			<label for="productStock">Product Stock</label>
			<input type="text" name="productStock" id="productStock" required>
			<br>
			<input type="submit" name="submit" value="Add Product">
		</form>
	</div>
</body>
