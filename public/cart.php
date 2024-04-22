<?php
	// starting the session
	session_start();

	// if the user is not logged in, send them to login page
	if (!$_SESSION['Active']){
	    header("Location: login.php");
	    exit;
	}
?>

<?php 
	// adding cart and product classes
	require '../class/product/Cart.php';
	require '../class/product/Product.php';
	use class\product\Cart as cartObj;
	use class\product\Product as productObj;

	// creating a cart object
	$cartObj = new cartObj();

	// adding product objects to cart object
	foreach ($_SESSION["Cart"] as $product) {
		$productObj = new productObj();
		$productObj->setProductID($product["ID"]);
		$productObj->setProductName($product["name"]);
		$productObj->setStock($product["stock"]);
		$productObj->setExpiraryDate($product["expDate"]);
		$cartObj->addToCart(array("quantity" => $product["quantity"], "obj"=> $productObj));
	}
?>

<!-- stylesheet -->
<link rel="stylesheet" type="text/css" href="../CSS/index.css">

<?php
	// adding the header to the page
	require '../layout/header.php';
?>

<div class="main-content" align="center">
	<h1 style="font-family:sans-serif;">Cart</h1>
	<!-- table for displaying information on products -->
	<table>
		<tr>
			<th>Product ID</th>
			<th>Product</th>
			<th>Expirary Date</th>
			<th>Stock</th>
			<th>Quantity</th>
		</tr>
		<?php
			// sending cart object to display cart function
			$cartObj->displayCart();
		?>
	</table>
	<!-- link for accessing payment page -->
	<a href="payment.php">Go to payment</a>
</div>

<?php
	// adding the footer to the bottom of the page
	require '../layout/footer.php';
?>