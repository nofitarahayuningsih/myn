<?php	
	// if save change happen
	if(!isset($_POST['save_change'])){
		echo "Something wrong!";
		exit;
	}

	$nama = trim($_POST['nama']);
	$username = trim($_POST['username']);
	$jumlah_feed = trim($_POST['jumlah_feed']);
	$deadline = trim($_POST['deadline']);
	$deskripsi = trim($_POST['deskripsi']);

	require_once("./functions/database_functions.php");
	$conn = db_connect();


	$query = "UPDATE feeds_instagram SET  
	nama = '$nama', 
	username = '$username', 
	jumlah_feed = '$jumlah_feed', 
	deadline = '$deadline',
	deskripsi = '$deskripsi'";

	
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't update data " . mysqli_error($conn);
		exit;
	} else {
		header("Location: admin_edit.php?username=$username");
	}
?>