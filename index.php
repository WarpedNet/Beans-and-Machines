<?php
// session_start();
// if (!$_SESSION['Active']){
//     header("Location: login.php");
//     exit;
// }
?>

<?php 

?>

<?php require 'layout/header.php'; ?>
<link rel="stylesheet" type="text/css" href="CSS/index.css">
<div class="main-content" align="center">
	<h1 style="font-family:sans-serif; color:red"><?php if(isset($_POST["sendToCart"])) {echo "Added to Cart!";}?></h1>
	<h1 style="font-family:sans-serif;">Products</h1>
	<form method="POST" action="index.php">

		<input type="submit" name="sendToCart" value="Add to Cart">
	</form>
</div>

<?php require 'layout/footer.php'; ?>