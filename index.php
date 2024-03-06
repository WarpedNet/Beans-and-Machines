<link rel="stylesheet" type="text/css" href="CSS/index.css">
<?php
	require "lib/database.php";
	$data = getData();
?>
<?php require 'layout/header.php'; ?>

<div class="main-content">
	<table>
		<tr>
			<th>ID</th>
			<th>Image</th>
			<th>Name</th>
			<th>Expirary</th>
			<th>Stock</th>
		</tr>
		<?php
		// creates a new row for each row of data gotten from the database, need to close the php "mode" to do html
		foreach ($data as $row) { ?>
			<tr>
				<td class="data"><?php echo $row[0];?></td>
				<td class="productImage"><img src="Images/Products/<?php echo $row[1] ?>.jpg" width=100vw></td>
				<td class="data"><?php echo $row[1];?></td>
				<td class="data"><?php echo $row[2];?></td>
				<td class="data"><?php echo $row[3];?></td>
				<td><a href="">More Information</a></td>
			</tr>
		<!-- This is needed to close the foreach command -->
		<?php } ?> 
	</table>
</div>

<?php require 'layout/footer.php'; ?>