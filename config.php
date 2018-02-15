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
// 	require_once ("../codebase/connector/db_mysqli.php");
// 	$res = mysqli_connect("localhost","m26415039","UKP889","m26415039");
// 	$dbtype = "MySQLi";

	//PostGre
// 	require_once ("../codebase/connector/db_postgre.php");
// 	$res = pg_connect("dbname=dae7tev5vslgku host=ec2-54-235-90-200.compute-1.amazonaws.com port=5432 user=eqrjpfbvzghnmz password=8c0160dafdaa082eaf2fc85a18cd76ca7c943530db9c9aa5769fd8cb36ab651e sslmode=require");
// 	$dbtype = "Postgre";
	
	function pg_connection_string_from_database_url() {
	  extract(parse_url($_ENV["DATABASE_URL"]));
	  return "user=$user password=$pass host=$host dbname=" . substr($path, 1); # <- you may want to add sslmode=require there too
	}
	# Here we establish the connection. Yes, that's all.
	$res = pg_connect(pg_connection_string_from_database_url());
	$dbtype = "Postgre";
	
?>
