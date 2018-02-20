<?php
	include "connect.php";

	if(isset($_POST['add']))
	{	
		$nama = $_POST['id'];
		
		$qselect = pg_query($con,"DELETE FROM tipe WHERE id = '$nama'"); 
	}

?>