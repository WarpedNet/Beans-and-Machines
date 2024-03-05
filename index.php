<?php
	require "lib/database.php";
	$data = getData();
?>
<?php require 'layout/header.php'; ?>

<div class="main-content">
	<table>
		<tr>
			<th>ID</th>
			<th>data</th>
		</tr>
		<?php
		// creates a new row for each row of data gotten from the database, need to close the php "mode" to do html
		foreach ($data as $row) { ?>
			<tr>
				<td><?php echo $row[0];?>
				<td><?php echo $row[1];?>
			</tr>
		<!-- This is needed to close the foreach command -->
		<?php } ?> 
	</table>
</div>

<?php require 'layout/footer.php'; ?>