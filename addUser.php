<?php
	include "connect.php";
	session_start();
	if(isset($_POST['add']))
	{	
		$initial = $_POST['nama'];
		$pass = $_POST['passw'];
		
		$max = mysqli_fetch_assoc(mysqli_query($con, "SELECT MAX(idUser) as maxid from user_am"));

		$id =  $max['maxid'] + 1;
		
		$qselect = mysqli_query($con,"INSERT INTO user_am values ($id, '$initial', '$pass')"); 

		$_SESSION['user'] = $initial;
		$_SESSION['idUser'] = $id;
	}

?>