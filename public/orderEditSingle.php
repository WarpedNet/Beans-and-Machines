<?php
	// start session if there is no active session
	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}
	// if the user is not admin, send them to login page
	if (isset($_SESSION["admin"]) == false || !$_SESSION['admin']){
		header("Location: login.php");
		exit;
	}
?>

<!-- setting the header at the top of the page -->
<?php 
	require '../layout/header.php';
?>

<?php
	require_once "../class/order/ProductOrder.php";
	require_once "../src/validation.php";
	$orderObj = new productOrder();

	// showing order details
	if (isset($_GET["id"]) && verifyID($_GET["id"])) {
		$orderObj->getOrder($_GET["id"]);
	
		if (isset($_POST["submit"])) {
			if ($_POST["userName"] != null) {
				$orderObj->setUserName($_POST["userName"]);
			}
			if ($_POST["productName"] != null) {
				$orderObj->setProductName($_POST["productName"]);
			}
			// verify ID works for this scenario
			if ($_POST["quantity"] != null && verifyID($_POST["quantity"])) {
				$orderObj->setQuantity($_POST["quantity"]);
			}
			$orderObj->updateOrder($_GET["id"]);
			header("Location: orders.php");
			exit();
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../CSS/header.css">
    <link rel="shortcut icon" href="../Images/Icons/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../CSS/index.css">
	<link rel="stylesheet" type="text/css" href="../CSS/admin.css">
    <title>Beans and Machines</title>
</head>
<body>
	<div class="main-content" align="center">
		<h1 style="font-family:sans-serif;">Edit Order</h1>
		<form method="POST">
			<label for="userName">User Name</label>
			<input type="text" name="userName" id="userName" placeholder="<?php echo $orderObj->getUserName(); ?>">
			<label for="productName">Product Name</label>
			<input type="text" name="productName" id="productName" placeholder="<?php echo $orderObj->getProductName(); ?>">
			<label for="quantity">Quantity</label>
			<input type="number" name="quantity" id="quantity" placeholder="<?php echo $orderObj->getQuantity(); ?>">
			<button type="submit" name="submit" value="Update Order">Update Order</button>
		</form>
	</div>
</body>

<?php
	// adding the footer to the page
	require '../layout/footer.php';
?>