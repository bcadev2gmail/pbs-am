<?php
	include 'connect.php';
	session_start();

	if(isset($_POST['add']))
	{
		$user = $_POST['name'];
		$check = pg_fetch_assoc(pg_query($con, "SELECT COUNT(*) as jml FROM user_am WHERE name LIKE '".$user."'"));

		if ($check['jml'] == 1) {
			echo json_encode(1);		
		} else {
			echo json_encode(2);
		}
	}
?>