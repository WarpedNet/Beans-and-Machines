<!-- including css -->
<link rel="stylesheet" type="text/css" href="CSS/index.css">

<!-- require header and database related files -->
<?php
	require 'layout/header.php'; 
	require_once 'lib/Operations.php';
	require 'lib/CRUD Operations/ReadProducts.php';
	require 'class/product/Product.php';
	require 'class/product/Cart.php';
	use class\product\Product as productObj;
	use class\product\Cart as cartObj;

	// creating an array of products
	$readProductsObj = new readProducts();
	$productObjArr = array();
	$cartObj = new cartObj();

	// referencing the readData function
	$productData = $readProductsObj->readData("*");

	// displaying the data
	foreach ($productData as $product) {
		$productObj = new productObj;
		$productObj->setProductID($product[0]);
		$productObj->setProductName($product[1]);
		$productObj->setExpiraryDate($product[2]);
		$productObj->setStock($product[3]);
		$productObjArr[] = $productObj;
	}
?>

<!-- table for displaying information -->
<div class="main-content" align="center">
	<h1 style="font-family:sans-serif;">Shopping-Cart</h1>
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

<!-- setting the footer at the bottom of the page -->
<?php require 'layout/footer.php'; ?>