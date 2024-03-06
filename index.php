<?php
	require "lib/database.php";
	$data = getData();
?>
<?php require 'layout/header.php'; ?>

<div class="main-content">
	<table>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Expirary date</th>
			<th>Stock</th>
		</tr>
		<?php
		// creates a new row for each row of data gotten from the database, need to close the php "mode" to do html
		foreach ($data as $row) { ?>
			<tr>
				<td class="data"><?php echo $row[0];?></td>
				<td class="data"><?php echo $row[1];?></td>
				<td class="data"><?php echo $row[2];?></td>
				<td class="data"><?php echo $row[3];?></td>
			</tr>
		<!-- This is needed to close the foreach command -->
		<?php } ?> 
	</table>
</div>

<?php require 'layout/footer.php'; ?>