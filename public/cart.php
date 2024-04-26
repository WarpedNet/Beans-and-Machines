<?php
	// if there is no session active, start session
	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}

	// if the user is not logged in, send them to login page
	if (!$_SESSION['Active']){
	    header("Location: login.php");
	    exit;
	}
?>

<?php

	if (isset($_GET["key"]) && preg_match('/\d/', $_GET["key"]) && isset($_SESSION["Cart"][$_GET["key"]]["quantity"])) {

		$_SESSION["Cart"][$_GET["key"]]["quantity"]--;

		if ($_SESSION["Cart"][$_GET["key"]]["quantity"] <= 0) {
			unset($_SESSION["Cart"][$_GET["key"]]);
		}
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
	<table>
		<tr>
			<th>Product Name</th>
			<th>Product Price</th>
			<th>Product Quantity</th>
			<th>Total</th>
		</tr>
		<?php
		if (isset($_SESSION["Cart"])) {
			$total = 0;
			foreach ($_SESSION["Cart"] as $key => $product) { 
				$itemCost = $product["price"]*$product["quantity"];
				$total += $itemCost;
				?>
				<tr>
					<td><?php echo $product["name"]; ?></td>
					<td><?php echo $product["price"]; ?></td>
					<td><?php echo $product["quantity"]; ?></td>
					<td><?php echo $itemCost; ?></td>
					<td><a href="cart.php?key=<?php echo $key; ?>">Remove from cart</a></td>
					</tr>
			<?php }} ?>
			<tr>
				<td></td>
				<td></td>
				<td>Total</td>
				<td><?php echo (isset($total)) ? $total : null ?></td>
			</tr>
	</table>
	
	<?php if (isset($_SESSION["Cart"]) && count($_SESSION["Cart"]) > 0) { ?>
		<a href="payment.php">Go to payment</a>
	<?php } else { ?>
		<a href="index.php">Add items to cart</a>
	<?php } ?>
	
</div>

<?php
	// adding the footer to the bottom of the page
	require '../layout/footer.php';
?>