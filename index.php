<link rel="stylesheet" type="text/css" href="CSS/index.css">
<?php
session_start();
if (!$_SESSION['Active']){
    header("Location: login.php");
    exit;
}
require 'layout/header.php'; ?>

<?php 
require 'lib/CRUD Operations/ReadProducts.php';
require 'class/product/Product.php';
require 'class/product/Cart.php';
use class\product\Product as productObj;
use class\product\Cart as cartObj;

$readProductsObj = new readProducts();
$productObjArr = array();
$cartObj = new cartObj();

$productData = $readProductsObj->readData("*");

foreach ($productData as $product) {
	$productObj = new productObj;
	$productObj->setProductID($product[0]);
	$productObj->setProductName($product[1]);
	$productObj->setExpiraryDate($product[2]);
	$productObj->setStock($product[3]);
	$productObjArr[] = $productObj;
}

?>
<div class="main-content" align="center">
	<h1 style="font-family:sans-serif;">Products</h1>
	<table>
		<tr>
			<th>Product ID</th>
			<th>Product</th>
			<th>Expirary Date</th>
			<th>Stock</th>
		</tr>
		<?php foreach ($productObjArr as $product) {?>
			<tr>
				<?php $product->displayProduct();?>
				<td>
			</tr>
		<?php } ?>
	</table>
</div>

<?php require 'layout/footer.php'; ?>