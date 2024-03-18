<link rel="stylesheet" type="text/css" href="CSS/index.css">

<?php require 'layout/header.php'; ?>
<?php require_once 'lib/Operations.php';
		$operationsObj = new Operations();
?>

<div class="main-content">
	<h1 style="font-family:sans-serif;">Shopping-Cart</h1>
</div>

<?php
	echo $operationsObj->readAllData("lPassword", "logininfo");
?>

<?php require 'layout/footer.php'; ?>