<?php
	include "connect.php";

	if(isset($_POST['add']))
	{	
		$nama = $_POST['nama'];
		
		$max = pg_fetch_assoc(pg_query($con, "SELECT MAX(id) as maxid from tipe"));

		$id =  $max['maxid'] + 1;
		
		$qselect = pg_query($con,"INSERT INTO tipe values ($id, '$nama')"); 
	}

?>