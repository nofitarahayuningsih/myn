<?php
	session_start();
	$title = "feeds instagram";
	require_once "./template/header.php";
	require "./functions/database_functions.php";
	$conn = db_connect();

	if(isset($_POST['add'])){
		$nama = trim($_POST['nama']);
		$nama = mysqli_real_escape_string($conn, $nama);
		
		$username = trim($_POST['title']);
		$username = mysqli_real_escape_string($conn, $username);

		$jumlah_feed = trim($_POST['author']);
		$jumlah_feed = mysqli_real_escape_string($conn, $jumlah_feed);
		
		$deadline = trim($_POST['descr']);
		$deadline = mysqli_real_escape_string($conn, $deadline);
		
		$deskripsi = floatval(trim($_POST['price']));
		$deskripsi = mysqli_real_escape_string($conn, $deskripsi);
	

		$query = "INSERT INTO feeds_instagram VALUES ('" . $nama . "', '" . $username . "', '" . $jumlah_feed . "', '" . $deadline . "', '" . $deskripsi . "')";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Can't add new data " . mysqli_error($conn);
			exit;
		} else {
			header("Location: index.php");
		}
	}
?>
	<div class="hero">
<br>
<section class="features">
		<h3 class="text-center">Masukan Deskripsi Feed IG yang Anda Inginkan</h3>

</section>

		<div class="tab_feed">
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
						<th>Jumlah feed</th>
						<td><input type="text" name="jumlah_feed" required></td>
					</tr>
					<tr>
						<th>Deadline</th>
						<td><input type="date" name="deadline"></td>
					</tr>
					<tr>
						<th>Deskripsi</th>
						<td><textarea name="deskripsi" cols="40" rows="5"></textarea></td>
					</tr>
					
				</table>
				<input type="submit" name="add" value="submit" class="btn btn-dark">
				<input type="reset" value="cancel" class="btn btn-half">
			</form>
		</div>
	</div>
	<br/>

<?php
	if(isset($conn)) {mysqli_close($conn);}
	require_once "./template/footer.php";
?>