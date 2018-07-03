<?php
	session_start();
	require_once "./functions/admin.php";
	$title = "List feed";
	require_once "./template/header.php";
	require_once "./functions/database_functions.php";
	$conn = db_connect();
	$result = getAll($conn);
?>
	<p class="lead"><a href="feed.php">ad new feed instagram</a></p>
	<a href="admin_signout.php" class="btn btn-primary">Sign out!</a>
	<table class="table" style="margin-top: 20px">
		<tr>
			<th>Nama</th>
			<th>USername</th>
			<th>Jumlah feed</th>
			<th>Deadline</th>
			<th>Deskipsi</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
		<?php while($row = mysqli_fetch_assoc($result)){ ?>
		<tr>
			<td><?php echo $row['cust_nama']; ?></td>
			<td><?php echo $row['cust_username']; ?></td>
			<td><?php echo $row['cust_jumlah_feed']; ?></td>
			<td><?php echo $row['cust_deadline']; ?></td>
			<td><?php echo $row['cust_deskripsi']; ?></td>
			<td><?php echo getPubName($conn, $row['publisherid']); ?></td>
			<td><a href="admin_edit.php?bookisbn=<?php echo $row['cust_username']; ?>">Edit</a></td>
			<td><a href="admin_delete.php?bookisbn=<?php echo $row['cust_username']; ?>">Delete</a></td>
		</tr>
		<?php } ?>
	</table>

<?php
	if(isset($conn)) {mysqli_close($conn);}
	require_once "./template/footer.php";
?>