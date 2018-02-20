<?php
	include "connect.php";
	session_start();
	if(isset($_POST['add']))
	{	
		$initial = $_POST['nama'];
		$pass = $_POST['passw'];
		
		$max = pg_fetch_assoc(pg_query($con, "SELECT MAX(idUser) as maxid from user_am"));

		$id =  $max['maxid'] + 1;
		
		$qselect = pg_query($con,"INSERT INTO user_am values ($id, '$initial', '$pass')"); 

		$_SESSION['user'] = $initial;
		$_SESSION['idUser'] = $id;
	}

?>