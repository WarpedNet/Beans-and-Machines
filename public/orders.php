<?php
	// start session if there is no session
	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}
	// if the user is not admin, send them back to login page
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

	$orderArray = $orderObj->getAllOrders();

	if (isset($_GET["id"]) && verifyID($_GET["id"])) {
		$orderObj->deleteOrder($_GET["id"]);
		header("Location: orders.php");
		exit();
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
		<table>
			<tr>
				<th>Order ID |</th>
				<th>User Name |</th>
				<th>Product Name |</th>
				<th>Quantity</th>
				<th>Edit Order</th>
				<th>Delete Order</th>
			</tr>
			<?php foreach ($orderArray as $order) { ?>
				<tr>
					<td><?php echo $order["id"]; ?></td>
					<td><?php echo $order["userName"]; ?></td>
					<td><?php echo $order["productName"]; ?></td>
					<td><?php echo $order["quantity"]; ?></td>
					<td><a href="orderEditSingle.php?id=<?php echo $order["id"] ?>">Edit Order</a></td>
					<td><a href="orders.php?id=<?php echo $order["id"]; ?>">Delete Order</a></td>
				</tr>
			<?php } ?>
		</table>
	</div>
</body>

<?php
	// adding the footer to the page
	require '../layout/footer.php';
?>