<!--
	ini editan dari admin_add.php
-->
<?php
	session_start();
	require_once "./functions/admin.php";
	$title = "Add new cust ig";
	require "./template/header.php";
	require "./functions/database_functions.php";
	$conn = db_connect();

	if(isset($_POST['add'])){
		$nama = trim($_POST['nama']);
		$nama = mysqli_real_escape_string($conn, $nama);
		
		$username = trim($_POST['username']);
		$username = mysqli_real_escape_string($conn, $username);

		$jumlah_feed = trim($_POST['jumlah_feed']);
		$jumlah_feed = mysqli_real_escape_string($conn, $jumlah_feed);
		
		$deadline = trim($_POST['deadline']);
		$deadline = mysqli_real_escape_string($conn, $deadline);
		
		$deskripsi = trim($_POST['deskripsi']);
		$deskripsi = mysqli_real_escape_string($conn, $deskrpsi);


		$query = "INSERT INTO feeds_instagram VALUES ('" . $nama . "', '" . $username . "', '" . $jumlah_feed . "', '" . $deadline . "', '" . $deskripsi . "')";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Can't add new data " . mysqli_error($conn);
			exit;
		} else {
			header("Location: thanks.php");
		}
	}
?>
	<form method="post" action="add.php" enctype="multipart/form-data">
		<table class="table">
			<tr>
				<th>Nama</th>
				<td><input type="text" name="nama"></td>
			</tr>
			<tr>
				<th>Username</th>
				<td><input type="text" name="username" required></td>
			</tr>
			<tr>
				<th>jumlah_feed</th>
				<td><input type="text" name="jumlah_feed" required></td>
			</tr>
			<tr>
				<th>deadline</th>
				<td><input type="file" name="deadline"></td>
			</tr>
			<tr>
				<th>Deskripsi</th>
				<td><textarea name="descr" cols="40" rows="5"></textarea></td>
			</tr>
			
		</table>
		<input type="submit" name="add" value="Add new cust" class="btn btn-primary">
		<input type="reset" value="cancel" class="btn btn-default">
	</form>
	<br/>
<?php
	if(isset($conn)) {mysqli_close($conn);}
	require_once "./template/footer.php";
?>