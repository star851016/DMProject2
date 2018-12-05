<?php
	//新增預約並扣除堂數

	require_once('database.php');
	$Begin_Time = $_POST["Begin_Time"];
	$Begin_Time = date("Y-m-d H:i:s", strtotime("$Begin_Time"));
	$I_ID = $_POST["I_ID"];
	$Course_ID = $_SESSION["Course_ID"];
	$res = $mysqli->query("INSERT INTO `appoint`(`I_ID`, `Course_ID`, `Begin_Time`, `If_Checkin`) 
							VALUES ('$I_ID','$Course_ID','$Begin_Time','Appoint')
						");
	$up =  $mysqli->query("UPDATE `course` 
							SET `Remaining_Number`= `Remaining_Number` - 1
							WHERE `Course_ID`=$Course_ID
						");
	if ($res === TRUE) {
    	echo "預約成功";
	} else {
	    echo "Error";
	}
?>