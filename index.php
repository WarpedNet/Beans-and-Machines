<link rel="stylesheet" type="text/css" href="CSS/index.css">
<?php
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

foreach ($productObjArr as $product) {
	if (isset($_POST[$product->getProductID()])) {
		$cartObj->addToCart()
	}
}

?>
<div class="main-content">
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
					<form method="post">
						<input type="submit" name="<?php echo $product->getProductID();?>" value="Add to cart"/>
					</form>
				</td>
			</tr>
		<?php } ?>
	</table>
</div>

<?php require 'layout/footer.php'; ?>