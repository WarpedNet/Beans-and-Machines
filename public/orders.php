<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION["admin"]) == false || !$_SESSION['admin']){
	header("Location: login.php");
	exit;
}
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
    <header>
        <span class="title-left">
            <!-- logo image -->
            <img src="../Images/ChangeMe.jpg", width=150vw>
            <strong>Beans and Machines</strong>
            <p class="title-links"><a href="../public/index.php">Products</a> | <a href="aboutUs.php">About Us</a> | <a href="contact.php">Contact</a> <?php echo (isset($_SESSION["admin"]) && $_SESSION["admin"] ? " | <a href='admin.php'>Admin</a>" : null); ?></p>
        </span>
        <span class="title-right">
            <!-- cart button -->
            <div class="title-buttons">
                <button onclick="location.href='cart.php'"><img src="../Images/Icons/cart.png", width=50vw></button>
                <p>Cart</p>
            </div>
            <!-- login button -->
            <div class="title-buttons">
                <?php if (isset($_SESSION["Active"]) && $_SESSION["Active"] = true) { ?>
                    <button onclick="location.href='../public/logout.php'"><img src="../Images/Icons/login.png", width=50vw></button>
                    <p>Log Out</p>  

                    <?php } else { ?>
                         <button onclick="location.href='login.php'"><img src="../Images/Icons/login.png", width=50vw></button> 
                         <p>Log In</p>
                         
                    <?php } ?>
            </div>
        </span>
    </header>

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
