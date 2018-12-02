<?php
	$mysqlhost = "localhost";
	$mysqluser = "root";
	$mysqlpassword = "";
	$mysqldb = "myadsl_gym";
	$mysqli= new mysqli($mysqlhost,$mysqluser,$mysqlpassword,$mysqldb);
	//錯誤處理
	if ($mysqli->connect_error != "") {
		echo "資料庫連結失敗！";
	}else{
		//設定字元集與編碼
		$mysqli->query("set names 'utf8';");
		date_default_timezone_set("Asia/Taipei");
	}
	session_start();
?>

