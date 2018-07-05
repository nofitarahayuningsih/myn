<?php 	
		function db_connect(){
			$conn =  mysqli_connect("localhost", "root", "", "mynproduction");
			if(!$conn){
			echo "Can't connect database " . mysqli_connect_error($conn);
			exit;
		}
		return $conn;

		}

		function getAll($conn){
			$query = "SELECT * from feeds_instagram ORDER BY nama DESC";
			$result = mysqli_query($conn, $query);
			if(!$result){
				echo "Can't retrieve data " . mysqli_error($conn);
			exit;
			}
			return $result;
		}
	


 ?>