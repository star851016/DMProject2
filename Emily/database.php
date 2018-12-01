<?php
	$mysqlhost = "localhost";
	$mysqluser = "root";
	$mysqlpassword = "datamodel";
	$mysqldb = "myadsl_gym";
	$mysqli= new mysqli($mysqlhost,$mysqluser,$mysqlpassword,$mysqldb);
	$mysqli->query("set names 'utf8';");
	date_default_timezone_set("Asia/Taipei");
	session_start();
?>