<?php
	require_once('database.php');
	$res = $mysqli->query("SELECT * FROM `instructor` WHERE 1");
	if (!$res) {
 		die("sql error:\n" . $mysqli->error);
	}
	
	for ($i=1;$i<$res->num_rows;$i++) {
	    // var_dump($num_rows);
	    echo $row["I_Name"];
	}
	echo "1" + "1";
	echo "<br>";
	echo "1" . "1";
	if ($mysqlhost == "localhost") {
		echo "對阿";
	}
	else {
		echo "錯惹";
	}
	function test($x) {
		echo $x;
	}
	test("asd");
	echo $_GET['id'];
	echo $_POST['id'];
	echo $_POST['name'];
  //   echo "<script type='text/javascript'>";
 	// echo "window.location.href='index2.php'";
 	// echo "</script>";
 	$_SESSION['time'] = "time";
 	echo $_SESSION['time'];
 	$_COOKIE['time'] = "ctime";
 	echo $_COOKIE['time'];
 	// session_unset();

 	$getdate = date("Y-m-d");
 	//取得一周的第幾天,星期天開始0-6
	$weekday = date("w", strtotime($getdate));

	 //本週開始日期
	echo $week_start_day = date("Y-m-d", strtotime("$getdate -".$weekday." days"));

	//本週結束日期
	echo $week_end_day = date("Y-m-d", strtotime("$week_start_day +1 days"));
	echo $week_end_day = date("Y-m-d", strtotime("$week_start_day +2 days"));
	echo $week_end_day = date("Y-m-d", strtotime("$week_start_day +3 days"));
	echo $week_end_day = date("Y-m-d", strtotime("$week_start_day +4 days"));
	echo $week_end_day = date("Y-m-d", strtotime("$week_start_day +5 days"));
	echo $week_end_day = date("Y-m-d", strtotime("$week_start_day +6 days"));

?>