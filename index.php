<link rel="stylesheet" type="text/css" href="CSS/index.css">
<?php require 'layout/header.php'; ?>

<?php 

require 'lib/CRUD Operations/ReadProducts.php';
require 'class/product/Product.php';


$readProductsObj = new readProducts();
$productsObj = new class\product\Product();

$productData = $readProductsObj->readData("*");
var_dump($productData);


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