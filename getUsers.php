<?php

	include "connect.php";

	if(isset($_POST['add'])){
		
		$data = array();
		$query = mysqli_query($con,"SELECT * FROM user_am");
		while ($key = mysqli_fetch_assoc($query)) {
			array_push($data, $key);
		}


		header('Content-type:text/x-json');
		echo json_encode($data);
		
	}

?>