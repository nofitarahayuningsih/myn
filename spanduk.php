<?php
	$title = "Administration section";
	require_once "./template/header.php";
?>


<section>
	
<div class="hero">
	<div id="kontak">
			<a href="https://instagram.com/mynproduction"><img src="kontak.jpg"></a>
	</div>

</div>



</section>
<?php 
	if(isset($conn)) {mysqli_close($conn);}
  	require_once "./template/footer.php";
?>	

