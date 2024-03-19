<?php
session_start();
if (!$_SESSION['Active']){
    header("Location: login.php");
    // exit;
}
?>

<?php 
// require 'class/product/Cart.php';
// use class\product\Cart as cartObj;

if (isset($_SESSION['Cart'])) {
	$cartObj = $_SESSION['Cart'];
}



?>
<link rel="stylesheet" type="text/css" href="CSS/index.css">
<?php require 'layout/header.php'?>
<div class="main-content" align="center">
	<h1 style="font-family:sans-serif;">Cart</h1>
	<table>
		<tr>
			<th>Product ID</th>
			<th>Product</th>
			<th>Expirary Date</th>
			<th>Stock</th>
		</tr>
		<?php $cartObj->displayCart() ?>

	</table>
</div>

<?php require 'layout/footer.php'; ?>