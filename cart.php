<link rel="stylesheet" type="text/css" href="CSS/index.css">

<?php 
require 'lib/CRUD Operations/ReadProducts.php';
require 'class/product/Product.php';
require 'class/product/Cart.php';
use class\product\Product as productObj;
use class\product\Cart as cartObj;

$readProductsObj = new readProducts();
$cartObj = new cartObj();

$productData = $readProductsObj->readData("*");
$productObjArr = array();
foreach ($productData as $product) {
	$productObj = new productObj;
	$productObj->setProductID($product[0]);
	$productObj->setProductName($product[1]);
	$productObj->setExpiraryDate($product[2]);
	$productObj->setStock($product[3]);
	$productObjArr[] = $productObj;
}

?>
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
	</table>
</div>

<?php require 'layout/footer.php'; ?>