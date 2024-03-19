<?php
session_start();
if (!$_SESSION['Active']){
    header("Location: login.php");
    // exit;
}
?>
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
	$productObjArr[] = array("pID"=>$product[0], "pObj"=>$productObj);	// 2D array because I need to search product ID
}

if (isset($_GET["cartMethod"])){
	if ($_GET["cartMethod"] == "addToCart") {
		$productIndex = array_search(intval($_GET["product"]), array_column($productObjArr, "pID"));	// https://www.php.net/manual/en/function.array-column
		foreach ($productObjArr[$productIndex]["pObj"] as $product) {
			$cartObj->addToCart($product);
		}
	}
}

?>
<?php require 'layout/header.php'; ?>
<link rel="stylesheet" type="text/css" href="CSS/index.css">
<div class="main-content" align="center">
	<h1 style="font-family:sans-serif;">Products</h1>
		<table>
		<tr>
			<th>Product ID</th>
			<th>Product</th>
			<th>Expirary Date</th>
			<th>Stock</th>
		</tr>
		<?php 
		foreach ($productObjArr as $product) { ?>
			<tr>
				<?php $product["pObj"]->displayProduct();?>
				<td>
					<form method="POST" action="index.php?cartMethod=addToCart&product=<?php echo $product["pID"]?>">
						<input type="number" name="quantity" value="quantity">
						<input type="submit" value="Add To Cart">
					</form>
				</td>
			</tr>
		<?php } ?>
	</table> 
</div>

<?php require 'layout/footer.php'; ?>