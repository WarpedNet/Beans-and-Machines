<?php
session_start();
if (!$_SESSION['Active']){
    header("Location: login.php");
    exit;
}
?>

<?php 
require '../class/product/Cart.php';
require '../class/product/Product.php';
use class\product\Cart as cartObj;
use class\product\Product as productObj;

$cartObj = new cartObj();

foreach ($_SESSION["Cart"] as $product) {
	$productObj = new productObj();
	$productObj->setProductID($product["ID"]);
	$productObj->setProductName($product["name"]);
	$productObj->setStock($product["stock"]);
	$productObj->setExpiraryDate($product["expDate"]);
	$cartObj->addToCart(array("quantity" => $product["quantity"], "obj"=> $productObj));
}
?>
<link rel="stylesheet" type="text/css" href="../CSS/index.css">
<?php require '../layout/header.php'?>
<div class="main-content" align="center">
	<h1 style="font-family:sans-serif;">Cart</h1>
	<table>
		<tr>
			<th>Product ID</th>
			<th>Product</th>
			<th>Expirary Date</th>
			<th>Stock</th>
			<th>Quantity</th>
		</tr>
		<?php $cartObj->displayCart();?>
	</table>
	<a href="payment.php">Go to payment</a>
</div>

<?php require '../layout/footer.php'; ?>