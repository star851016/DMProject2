<?php
	$mysqlhost = "localhost";
	$mysqluser = "root";
	$mysqlpassword = "";
	$mysqldb = "myadsl_gym";
	$mysqli= new mysqli($mysqlhost,$mysqluser,$mysqlpassword,$mysqldb);
	//錯誤處理
	if ($mysqli->connect_error != "") {

		$mysqlhost = "project2-2.cr44rp6foiyg.ap-southeast-1.rds.amazonaws.com";
		$mysqluser = "MADSL";
		$mysqlpassword = "d.m._MADSL";
		$mysqldb = "MyADSL_GYM";
		$mysqli= new mysqli($mysqlhost,$mysqluser,$mysqlpassword,$mysqldb);
		if ($mysqli->connect_error != "") {
			echo "本機資料庫連結失敗，嘗試連線線上資料庫！\n";
			echo "線上資料庫連結失敗！";
		}else{
			//設定字元集與編碼
			$mysqli->query("set names 'utf8';");
			date_default_timezone_set("Asia/Taipei");
		}
	}else{
		//設定字元集與編碼
		$mysqli->query("set names 'utf8';");
		date_default_timezone_set("Asia/Taipei");
	}
	session_start();
?>

