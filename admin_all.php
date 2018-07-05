<?php
	session_start();
	require_once "./functions/admin.php";
	$title = "Administration section";
	require_once "./template/header.php";
	require_once "./functions/database_functions.php";
	$conn = db_connect();
	$result = getAll($conn);
?>
<section>
	<div class="hero">
		<p class="lead"><a href="admin_add.php">Add new feed</a></p>
			<a href="admin_signout.php" class="btn btn-dark">Sign out!</a>
			<table class="table" style="margin-top: 20px">
				<tr>
					<th>Nama</th>
					<th>Username</th>
					<th>Jumlah Feed</th>
					<th>Deadline</th>
					<th>Deskripsi</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
				</tr>
				<?php while($row = mysqli_fetch_assoc($result)){ ?>
				<tr>
					<td><?php echo $row['nama']; ?></td>
					<td><?php echo $row['username']; ?></td>
					<td><?php echo $row['jumlah_feed']; ?></td>
					<td><?php echo $row['deadline']; ?></td>
					<td><?php echo $row['deskripsi']; ?></td>
					<td><a href="admin_edit.php?username=<?php echo $row['username']; ?>">Edit</a></td>
					<td><a href="admin_delete.php?username=<?php echo $row['username']; ?>">Delete</a></td>
				</tr>
				<?php } ?>
			</table>
	</div>
</section>