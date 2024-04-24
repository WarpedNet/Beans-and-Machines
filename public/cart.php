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
			foreach ($_SESSION["Cart"] as $product) { ?>
				<tr>
					<td><?php echo $product["name"]; ?></td>
					<td><?php echo $product["price"]; ?></td>
					<td><?php echo $product["quantity"]; ?></td>
					<td><?php echo $product["price"]*$product["quantity"]; ?></td>
				</tr>
			<?php }} ?>
	</table>
	<a href="payment.php">Go to payment</a>
</div>

<?php
	// adding the footer to the bottom of the page
	require '../layout/footer.php';
?>