<link rel="stylesheet" type="text/css" href="CSS/index.css">
<?php
require 'layout/header.php'; ?>

<?php 

require 'lib/CRUD Operations/ReadProducts.php';
require 'class/product/Product.php';
use class\product\Product as productObj;


$readProductsObj = new readProducts();
$object = new productObj;

$productData = $readProductsObj->readData("*");
var_dump($object);


// $productsObj->setProductID(1)
?>
<div class="main-content">
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