<?php
	include "connect.php";

	if(isset($_POST['add']))
	{	
		$nama = $_POST['nama'];
		
		$max = mysqli_fetch_assoc(mysqli_query($con, "SELECT MAX(id) as maxid from tipe"));

		$id =  $max['maxid'] + 1;
		
		$qselect = mysqli_query($con,"INSERT INTO tipe values ($id, '$nama')"); 
	}

?>