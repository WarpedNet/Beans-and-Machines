<?php
	// start session if there is no active session
	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}

	// if the user is not admin, send them to login page
	if (isset($_SESSION["admin"]) == false || !$_SESSION['admin']){
		header("Location: login.php");
		exit;
	}

	// requiring validation file
	require_once "../src/validation.php";

	if (isset($_GET["id"]) && verifyID($_GET["id"])) {
		require_once "../class/product/product.php";
		$productObj = new product();
		$productObj->getProductFromDB($_GET["id"]);

		// Checking if the user actually changed the var otherwise it would just delete the original data
		if (isset($_POST["submit"])) {
			if ($_POST["productName"] != null) {
				$productObj->setName($_POST["productName"]);
			}
			if ($_POST["productDesc"] != null) {
				$productObj->setDesc($_POST["productDesc"]);
			}
			if ($_POST["productAge"] != null) {
				$productObj->setAge($_POST["productAge"]);
			}
			if ($_POST["productVendor"] != null) {
				$productObj->setVendor($_POST["productVendor"]);
			}
			if ($_POST["productPrice"] != null) {
				$productObj->setPrice($_POST["productPrice"]);
			}
			if ($_POST["productStock"] != null) {
				$productObj->setStock($_POST["productStock"]);
			}
			$productObj->updateProduct($_GET["id"]);

			// Redirecting back to the original page
			header("location: productEdit.php");
			exit();
		}
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
	<div class="main-content" align="center">
		<h1 style="font-family:sans-serif;">Edit Product</h1>
		<form method="POST">
				<label for="productName">Product Name</label>
				<input type="text" name="productName" id="productName" placeholder="<?php echo $productObj->getName();?>">
				<br>
				<label for="productDesc">Product Description</label>
				<input type="text" name="productDesc" id="productDesc" placeholder="<?php echo $productObj->getDesc();?>">
				<br>
				<label for="productAge">Product Age</label>
				<input type="text" name="productAge" id="productAge" placeholder="<?php echo $productObj->getAge();?>">
				<br>
				<label for="productVendor">Product Vendor</label>
				<input type="text" name="productVendor" id="productVendor" placeholder="<?php echo $productObj->getVendor();?>">
				<br>
				<label for="productPrice">Product Price</label>
				<input type="text" name="productPrice" id="productPrice" placeholder="<?php echo $productObj->getPrice();?>">
				<br>
				<label for="productStock">Product Stock</label>
				<input type="text" name="productStock" id="productStock" placeholder="<?php echo $productObj->getStock();?>">
				<br>
				<button type="submit" name="submit" value="Update Product">Update Product</button>
		</form>
	</div>
</body>

<?php
	// adding the footer to the page
	require '../layout/footer.php';
?>