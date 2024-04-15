<?php require 'layout/header.php'; ?>
<?php

require "lib/common.php";

// table is the table you want to insert into
// newData is an associative array of the data
function Create($table, $newData) {
	try {
		require_once "src/DBconnect.php";
		
		$query = sprintf("INSERT INTO %s (%s) values (%s)", $table, implode(", ", array_keys($newData)), ":".implode(", :", array_keys($newData)));

		$statement = $connection->prepare($query);
		$statement->execute($newData);
	}
	catch (PDOException $error) {
		echo $query."<br>".$error->getMessage();
	}
}

if (isset($_POST["submitProduct"])) {
	$productData = array(
		"productName"	=>	escape($_POST["productName"]),
		"productDesc"	=>	escape($_POST["productDesc"]),
		"productAge"	=>	escape($_POST["productAge"]),
		"productVendor"	=>	escape($_POST["productVendor"]),
		"productPrice"	=>	escape($_POST["productPrice"])
	);

	Create("products", $productData);
}
?>
<link rel="stylesheet" type="text/css" href="CSS/index.css">
<link rel="stylesheet" type="text/css" href="CSS/admin.css">
<div class="main-content" align="center">
	<h1 style="font-family:sans-serif;">Add Product</h1>
	<form method="POST">
		<label for="productName">Product Name</label>
		<input type="text" name="productName" id="productName" required>
		<label for="productDesc">Product Description</label>
		<input type="text" name="productDesc" id="productDesc" required>
		<label for="productAge">Product Age</label>
		<input type="text" name="productAge" id="productAge" required>
		<label for="productVendor">Product Vendor</label>
		<input type="text" name="productVendor" id="productVendor" required>
		<label for="productPrice">Product Price</label>
		<input type="text" name="productPrice" id="productPrice" required>
		<input type="submit" name="submitProduct" value="Add Product">
	</form>
</div>

<?php require 'layout/footer.php'; ?>