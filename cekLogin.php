<?php
	include 'connect.php';
	session_start();

	if(isset($_POST['add']))
	{
		$user = $_POST['name'];
		$pass = $_POST['pass'];
		// $user = 'admin';
		// $pass = 'admin';
		$check = pg_fetch_assoc(pg_query($con, "SELECT COUNT(*) as jml FROM user_am WHERE name LIKE '".$user."' AND password LIKE '".$pass."'"));
		if ($check['jml'] == 1) {
			$data = pg_fetch_assoc(pg_query($con, "SELECT * FROM user_am WHERE name LIKE '".$user."' AND password LIKE '".$pass."'"));
			
			$_SESSION['user'] = $data['name'];
			$_SESSION['idUser'] = $data['iduser'];

			if($data['iduser'] == 1)
			{
				$_SESSION['status'] = 2;
			}else{
				$_SESSION['status'] = 1;
			}

			// echo $_SESSION['status'];

			echo json_encode(1);		

		} else {
			echo json_encode(2);
		}
	}
?>
