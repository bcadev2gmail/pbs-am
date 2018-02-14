<?php

	// require_once('common/connector/db_sqlite3.php');
	
	// SQLite
	// $dbtype = "SQLite3";
	// $res = new SQLite3(dirname(__FILE__)."/database.sqlite");

	// Mysql
	// $dbtype = "MySQL";
	// $res=mysql_connect("192.168.1.251", "scheduler", "scheduler");
	// mysql_select_db("schedulertest");

	// PDO
	// require_once (dirname(__FILE__).'/connector/db_pdo.php");
	// $res = new PDO("mysql:192.168.1.251;dbname=schedulertest", "scheduler", "scheduler");
	// $dbtype = "PDO";

	// MySQLi
	require_once ("../codebase/connector/db_mysqli.php");
	$res = mysqli_connect("localhost","m26415039","UKP889","m26415039");
	$dbtype = "MySQLi";
?>