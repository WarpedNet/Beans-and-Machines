<link rel="stylesheet" type="text/css" href="CSS/index.css">

<?php require 'layout/header.php'; ?>
<?php $operations = require 'lib/Operations.php'; ?>

<div class="main-content">
	<h1 style="font-family:sans-serif;">Shopping-Cart</h1>
</div>

<?php
	echo $operations->readData("*", "Product", "pID", 21);
?>

<?php require 'layout/footer.php'; ?>