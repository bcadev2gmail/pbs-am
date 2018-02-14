<?php
	include "connect.php";

	if(isset($_POST['add']))
	{	
		$nama = $_POST['id'];
		
		$qselect = mysqli_query($con,"DELETE FROM tipe WHERE id = '$nama'"); 
	}

?>