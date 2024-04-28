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
?>

<!-- setting the header at the top of the page -->
<?php 
	require '../layout/header.php';
?>

<?php
	require_once "../class/product/product.php";
	require_once "../src/validation.php";

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

		// header to remove the id=NUM in the link (prevents the form from resubmitting)
		header("Location: productEdit.php");
		exit();
	}

	if (isset($_GET["id"]) && verifyID($_GET["id"])) {
		$productObj->deleteProduct($_GET["id"]);

		// header to remove the id=NUM in the link (prevents the form from resubmitting)
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