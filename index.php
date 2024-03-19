<?php
session_start();
if (!$_SESSION['Active']){
    header("Location: login.php");
    // exit;
}
?>

<?php 
require_once 'lib/GetProducts.php';
require_once 'lib/GetCart.php';

// if (isset($_POST["cartMethod"])){
// 	if ($_GET["cartMethod"] == "addToCart") {
// 		$productIndex = array_search(intval($_POST["product"]), array_column($_SESSION['productObjArr'], "pID"));	// https://www.php.net/manual/en/function.array-column
// 		for ($iter = 0; $iter < intval($_POST['quantity']); $iter++) {
// 			$_SESSION['Cart']->addToCart($_SESSION['productObjArr'][$productIndex]["pObj"]);
// 		}
// 	}
// }

if (isset($_POST["addToCart"])) {
	foreach ($_POST as $value) {
		if (str_contains($value, "quantity")) {

		}
	}
}


?>
<?php require 'layout/header.php'; ?>
<link rel="stylesheet" type="text/css" href="CSS/index.css">
<div class="main-content" align="center">
	<h1 style="font-family:sans-serif;">Products</h1>
	<form method="POST" action="index.php">
		<table>
		<tr>
			<th>Product ID</th>
			<th>Product</th>
			<th>Expirary Date</th>
			<th>Stock</th>
		</tr>
		<?php 
		foreach ($_SESSION['productObjArr'] as $product) { ?>
			<tr>
				<?php $product["pObj"]->displayProduct();?>
				<td>
					<input type="number" name="<?php echo "quantity".$product["pID"];?>" value="quantity">
				</td>
			</tr>
		<?php } ?>
		</table>
		<input type="submit" name="addToCart" value="AddToCart">
	</form>
</div>

<?php require 'layout/footer.php'; ?>