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
require_once "../class/product/product.php";

$productObj = new product();
$productArray = $productObj->getAllProducts();

if (isset($_POST["submit"])){
	$productObj->setName($_POST["productName"]);
	$productObj->setDesc($_POST["productDesc"]);
	$productObj->setAge($_POST["productAge"]);
	$productObj->setVendor($_POST["productVendor"]);
	$productObj->setPrice($_POST["productPrice"]);
	$productObj->setStock($_POST["productStock"]);
	$productObj->sendProductToDB();

	// Header to remove the id=NUM in the link (prevents the form from resubmitting)
	header("Location: productEdit.php");
	exit();
}

if (isset($_GET["id"]) && preg_match("/\d/", $_GET["id"]) && $_GET["id"] >=0) {
	$productObj->deleteProduct($_GET["id"]);

	// Header to remove the id=NUM in the link (prevents the form from resubmitting)
	header("Location: productEdit.php");
	exit();
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
		<div>
			<h1 style="font-family:sans-serif;">Current Products</h1>
			<table>
				<tr>
					<th>Product Name |</th>
					<th>Product Description |</th>
					<th>Product Age |</th>
					<th>Product Vendor |</th>
					<th>Product Price |</th>
					<th>Product Stock</th>
					<th>Edit Product</th>
					<th>Delete Product</th>
				</tr>
				<tr>
					<td></td>
				</tr>
			<?php
			foreach ($productArray as $product) { ?>
				<tr>
					<td><?php echo $product["productName"] ?></td>
					<td><?php echo $product["productDesc"] ?></td>
					<td><?php echo $product["productAge"] ?></td>
					<td><?php echo $product["productVendor"] ?></td>
					<td><?php echo $product["productPrice"] ?></td>
					<td><?php echo $product["productStock"] ?></td>
					<td><a href="productEditSingle.php?id=<?php echo $product["id"];?>">Edit Product</a></td>
					<td><a href="productEdit.php?id=<?php echo $product["id"];?>">Delete Product</a></td>
				</tr>
			<?php } ?>
		</table>

		</div>
		<div>
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
	</div>
</body>

<?php
	// adding the footer to the page
	require '../layout/footer.php';
?>