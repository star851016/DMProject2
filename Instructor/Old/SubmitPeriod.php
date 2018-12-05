<?php
	//新增或刪除時段(period)
	require_once('database.php');
	if(isset($_POST["Begin_Time"])){
		echo "getBG";
		$Begin_Time = $_POST["Begin_Time"];
	}
	
	$Begin_Time = date("Y-m-d H:i:s", strtotime("$Begin_Time"));
	print($Begin_Time);
	
	$I_ID = $_POST["I_ID"];
	print(I_ID);
	

			
	if(mysqli_fetch_row($mysqli->query("SELECT * FROM `period` WHERE `I_ID`= $I_ID AND `Begin_Time`=$Begin_Time;"))){
		#有排課	
		
		$query1 = mysqli_fetch_row($mysqli->query("SELECT * FROM `period` WHERE `I_ID`= $I_ID AND `Begin_Time`=$Begin_Time;"));
		if( ($query1) and ($query1 != 'cancel') ){
			#有被Mb選 且該Mb未取消
			print('Appointed');
			
		}else{
			#未被Mb選
			$DELETE1 = $mysqli->query("DELETE FROM `period` WHERE (`I_ID`, `Begin_Time`)=($I_ID,$Begin_Time);");
		}
	
	}else{
		#未排課	
		$INSERT1 = $mysqli->query("INSERT INTO `period`(`I_ID`, `Begin_Time`) VALUES ('$I_ID','$Begin_Time'); ");
	}
?>