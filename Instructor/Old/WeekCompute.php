<?php
	//計算當週日期及上下週功能
	//查詢該課程所有教練有空的時段	
	require_once('database.php');
	$getdate = date("Y-m-d H:i:s");
	
 	//取得一周的第幾天,本系統星期一開始，若當日是星期天weekday=6
	$weekday = date("w", strtotime("$getdate -1 days"));

	// session week 初始設定0(當週)
	if(!isset($_SESSION["week"])){
		$_SESSION["week"] = 0;
	}

	// 如果未按上一週(-1)或下一週(1)的按鈕，就沒有post calweek的參數
	if(!isset($_POST["calWeek"])){
		$_POST["calWeek"] = 0;
	}	

	// 計算第幾週
	$_SESSION["week"] = $_SESSION["week"] + $_POST["calWeek"];

	// 當週是0，不能按上一週 
	if($_SESSION["week"] < 0){$_SESSION["week"]=0;}

	$week = $_SESSION["week"] * 7;	
	$week = $week - $weekday;

	 //本週日期
	$Mon = date("m/d", strtotime("$getdate +".$week." days"));
	$Tues = date("m/d", strtotime("$Mon +1 days"));
	$Wed = date("m/d", strtotime("$Mon +2 days"));
	$Thru = date("m/d", strtotime("$Mon +3 days"));
	$Fri = date("m/d", strtotime("$Mon +4 days"));
	$Sat = date("m/d", strtotime("$Mon +5 days"));
	$Sun = date("m/d", strtotime("$Mon +6 days"));
	$Start = date("Y-m-d", strtotime("$getdate +".$week." days"));
	$End = date("Y-m-d", strtotime("$Mon +6 days"));

	// 如果沒有選課程就不存入session，有的話課程ID就存入session
	if(!isset($_POST["Course_ID"]) or $_POST["Course_ID"] == ""){} 
	else {
		$_SESSION["Course_ID"] = $_POST["Course_ID"];
	}

	// 清空時間表變數
	for ($i=1;$i<=7;$i++) {
		for ($j=1;$j<=11;$j++) {
			if ($j < 10) {$j = "0".$j;}
			$_SESSION["W".$i."_".$j] = "Arrranged";
		}
	}
?>