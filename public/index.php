<?php
	// if there is no session active, start session
	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}

	// if the user is not logged in, send them back to the login page
	if (!$_SESSION['Active']){
		header("Location: login.php");
		exit;
	}
?>

<?php 
	require_once "../class/product/product.php";

	$productObj = new product();
	$productArray = $productObj->getAllProducts();

	// Checking that the key sent is a number & is less than the array & that's its greater than 0
	// https://www.php.net/manual/en/function.preg-match
	if (isset($_GET["key"])) {

		$indexKey = $_GET["key"];

		if (!isset($_SESSION["Cart"])) {
			$_SESSION["Cart"] = array();
		}

		if (preg_match("/\d/", $indexKey) && $indexKey <= count($productArray) && $indexKey >=0) {
			if (!isset($_SESSION["Cart"][$indexKey])) {
				$_SESSION["Cart"][$indexKey] = array(
					"id" 	  	=> $productArray[$indexKey]["id"],
					"name"    	=> $productArray[$indexKey]["productName"],
					"price"   	=> $productArray[$indexKey]["productPrice"],
					"stock"     => $productArray[$indexKey]["productStock"],
					"quantity"	=> 1
				);

			}
			else {
				$_SESSION["Cart"][$indexKey]["quantity"]++;
                //this method works to reduce the stock but it can go below zero for some reason, i'm fixing it - callum
                $productObj->takeFromStock($productArray[$indexKey]["id"],$productArray[$indexKey]["productStock"]);
			}

			if ($productArray[$indexKey]["productStock"] < $_SESSION["Cart"][$indexKey]["quantity"]) {
				$_SESSION["Cart"][$indexKey]["quantity"]--;
				echo "Product out of stock!";
			}
			// Put code here to display "Added to cart" or whatever
			//ok i'll just echo it lmao - callum
			//
            echo "Added to cart!";
		}

	}

?>

<?php
	// adding the header to the top of the page
	require '../layout/header.php';
?>
<!-- stylesheet -->
<link rel="stylesheet" type="text/css" href="../CSS/index.css">

<!-- div class to centre page contents -->
<div class="main-content" align="center">
	<!-- header for display -->
	<h1 style="font-family:sans-serif;">Products</h1> 
	<!-- form -->
	<form method="POST" action="index.php">
		<table>
			<tr>
				<th>Product Name |</th>
				<th>Product Description |</th>
				<th>Product Age |</th>
				<th>Product Vendor |</th>
				<th>Product Price |</th>
				<th>Product Stock</th>
			</tr>
			<tr>
				<td></td>
			</tr>
			<?php
			foreach ($productArray as $key => $product) { ?>
				<tr>
					<td><?php echo $product["productName"] ?></td>
					<td><?php echo $product["productDesc"] ?></td>
					<td><?php echo $product["productAge"] ?></td>
					<td><?php echo $product["productVendor"] ?></td>
					<td><?php echo $product["productPrice"] ?></td>
					<td><?php echo $product["productStock"] ?></td>
					<td><a href="index.php?key=<?php echo $key?>">Add to Cart</a></td>
				</tr>
			<?php } ?>
			
		</table>
	</form>
</div>

<?php
	// adding the footer to the page
	require '../layout/footer.php';
?>