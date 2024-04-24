<?php
session_start();
if (!$_SESSION['Active']){
    header("Location: login.php");
    exit;
}
?>

<?php 
	if (isset($_POST["submit"])) {
		require_once "../class/order/paymentInfo.php";
		require_once "../class/product/product.php";

		$paymentInfoObj = new paymentInfo();
		$paymentInfoObj->setCardNumber($_POST["cardNum"]);
		$paymentInfoObj->setCardExpDate($_POST["expDate"]);
		$paymentInfoObj->setCardCVV($_POST["cardCVV"]);
		$paymentInfoObj->setCardType($_POST["cardType"]);
		// $paymentInfoObj->sendToDatabase(); Need to add a check to make sure it doesnt already exist

		$productObj = new product();

		foreach ($_SESSION["Cart"] as $product) {
			$productObj->updateStock($product["id"], ($product["stock"]-$product["quantity"]));
		}


		$_SESSION["Cart"] = array(); // Remove everything from cart since you already bought it


		header("Location: orderconfirmed.php"); // After payment send person to place or whatever
		exit;
	}
?>


<?php require '../layout/header.php'?>
<link rel="stylesheet" type="text/css" href="CSS/index.css">
<div class="main-content" align="center">
	<h1 style="font-family:sans-serif;">Your Cart</h1>
	<table>
		<tr>
			<th>Product Name</th>
			<th>Product Price</th>
			<th>Product Quantity</th>
			<th>Total</th>
		</tr>
		<?php
		if (isset($_SESSION["Cart"])) {
			$total = 0;
			foreach ($_SESSION["Cart"] as $product) { 
				$itemCost = $product["price"]*$product["quantity"];
				$total += $itemCost;
				?>
				<tr>
					<td><?php echo $product["name"]; ?></td>
					<td><?php echo $product["price"]; ?></td>
					<td><?php echo $product["quantity"]; ?></td>
					<td><?php echo $itemCost; ?></td>
				</tr>
			<?php }} ?>
			<tr>
				<td></td>
				<td></td>
				<td>Total</td>
				<td><?php echo $total ?></td>
			</tr>
	</table>
	<h1 style="font-family:sans-serif;">Payment Information</h1>
	<form method="POST">
		<label for="cardNum">Card Number</label>
		<input type="number" id="cardNum" name="cardNum"><br>
		<label for="expDate">Expirary Date</label>
		<input type="date" id="expDate" name="expDate"><br>
		<label for="cardCVV">CVV Number</label>
		<input type="number" id="cardCVV" name="cardCVV"><br>
		<label for="MasterCard">MasterCard</label>
		<input type="radio" id="MasterCard" name="cardType" value="masterCard">
		<label for="Visa">Visa</label>
		<input type="radio" id="Visa" name="cardType" value="visa"><br>
		<input type="submit" name="submit" value="Purchase">
	</form>

</div>

<?php require '../layout/footer.php'; ?>