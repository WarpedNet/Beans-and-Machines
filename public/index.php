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
	require_once "../class/product/product.php";

	$productObj = new product();
	$productArray = $productObj->getAllProducts();

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
		<table>
			<tr>
				<th>Product Name |</th>
				<th>Product Description |</th>
				<th>Product Age |</th>
				<th>Product Vendor |</th>
				<th>Product Price |</th>
				<th>Product Stock</th>
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
					<td><a href="index.php?product=<?php echo $product["productName"]?>">Add to Cart</a></td>
				</tr>
			<?php } ?>
			
		</table>
		<input type="submit" name="sendToCart" value="Add to Cart">
	</form>
</div>

<?php
	// adding the footer to the page
	require '../layout/footer.php';
?>