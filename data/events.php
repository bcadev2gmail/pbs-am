<?php
	require_once('../codebase/connector/scheduler_connector.php');
	include_once ('../config.php');
	include_once ('../connect.php');

	$scheduler = new SchedulerConnector($res, $dbtype);
	$scheduler->render_table("calendar","id","start_date,end_date,text,description,id_tipe,idUser");
	
?>
