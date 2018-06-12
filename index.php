<?php 	
	session_start();

	$title = "Index";
	//connect to database
	require_once "./template/header.php";
	require_once "./functions/database_functions.php";
	$conn = db_connect();


 ?>
 <div class="hero">
			<h1>MYN PRODUCTION </h1> <h5>SMALLEST INSPIRATION </h5>
			<div class="button-awesome">
				<a href="" class="btn btn-full"> I'm Order </a>
				<a href="show.php" class="btn btn-half"> Show me more </a>
			</div>
		</div>


<?php 
	if(isset($conn)) {mysqli_close($conn);}
  	require_once "./template/footer.php";
?>