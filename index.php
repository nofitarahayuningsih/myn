<?php 	
	session_start();

	$title = "Index";
	//connect to database
	require_once "./template/header.php";
	require_once "./functions/database_functions.php";
	$conn = db_connect();


 ?>

 <div class="hero">
 			<div class="container">
 				<div class="row">
 					<div class="col-xs-4">
 						<h1>MYN PRODUCTION </h1> <h5>SMALLEST INSPIRATION </h5>
 					</div>
 				</div>
 			</div>
			<div class="button-awesome">
				<div class="container">
					<div class="row">
						<div class="col-xs-6 col-md-6">
							<a href="" class="btn btn-full btn-xs"> I'm Order </a>
				<a href="show.php" class="btn btn-half"> Show me more </a>
						</div>
					</div>
				</div>
			</div>
		</div>


<?php 
	if(isset($conn)) {mysqli_close($conn);}
  	require_once "./template/footer.php";
?>