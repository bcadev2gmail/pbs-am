<?php
	include 'connect.php';
	session_start();

	if(isset($_POST['add']))
	{
		$start = $_POST['start'];
		$end = $_POST['end'];
		$type = $_POST['type'];
		$id = $_POST['id'];

		$check = pg_fetch_assoc(pg_query($con, "SELECT COUNT(*) as jml FROM calendar WHERE (end_date BETWEEN '".$start."' AND '".$end."') AND id_tipe LIKE ".$type));

		$hasil = [];

		if ($check['jml'] > 1) {
			$data = pg_fetch_assoc(pg_query($con, "SELECT max(id) as maxId FROM calendar WHERE (end_date BETWEEN '".$start."' AND '".$end."') AND id_tipe LIKE '".$type."'"));

			$max = $data['maxId'];

			$data1 = pg_fetch_assoc(pg_query($con, "SELECT idUser as hps FROM calendar WHERE id='".$max."'"));
			
			if($data1['hps'] == $id)
			{
				$qselect = pg_query($con,"DELETE FROM calendar WHERE id='".$max."'"); 
				echo json_encode(1);
			}else{
				echo json_encode(2);	
			}
		} else {
			echo json_encode(2);
		}

	}
?>