<?php
	session_start();
	require_once "./functions/admin.php";
	$title = "Edit Feed";
	require_once "./template/header.php";
	require_once "./functions/database_functions.php";
	$conn = db_connect();

	if(isset($_GET['username'])){
		$username = $_GET['username'];
	} else {
		echo "Empty query!";
		exit;
	}

	if(!isset($username)){
		echo "Empty username! check again!";
		exit;
	}

	// get customer data
	$query = "SELECT * FROM feeds_instagram WHERE username = '$username'";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't retrieve data " . mysqli_error($conn);
		exit;
	}
	$row = mysqli_fetch_assoc($result);
?>
<section>
	<div class="hero">
		<form method="post" action="edit_feed.php" enctype="multipart/form-data">
			<table class="table">
				<tr>
					<th>Nama</th>
					<td><input type="text" name="nama" value="<?php echo $row['nama'];?>" readOnly="true"></td>
				</tr>
				<tr>
					<th>Username</th>
					<td><input type="text" name="username" value="<?php echo $row['username'];?>" required></td>
				</tr>
				<tr>
					<th>Jumlah Feed</th>
					<td><input type="text" name="jumlah feed" value="<?php echo $row['jumlah_feed'];?>" required></td>
				</tr>
				<tr>
					<th>Deadline</th>
					<td><input type="date" name="deadline" value="<?php echo $row['deadline'];?>" required></td>
				</tr>
				<tr>
					<th>Deskripsi</th>
					<td><textarea name="deskripsi" cols="40" rows="5"><?php echo $row['deskripsi'];?></textarea></td>
				</tr>
			</table>
			<input type="submit" name="save_change" value="Change" class="btn btn-primary"> <input type="reset" value="cancel" class="btn btn-dark">
			<a href="admin_all.php" class="btn btn-success">Confirm</a>
			<br>
		</form>
	
	</div>

</section>
<?php
	if(isset($conn)) {mysqli_close($conn);}
	require "./template/footer.php"
?>