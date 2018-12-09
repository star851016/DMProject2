<?php
	#這個程式用來處理已約未上的兩個按鈕
	require_once('database.php');
	//空白表單所記錄的index = 第幾筆資料
	if(isset($_POST ["currentindex"])){
		$i =  $_POST ["currentindex"];
		print("i=".$i);
	}else{
		$i =  1;
	}
	//接收傳送過來的陣列
	if(isset($_POST ['IIDArray'])){
		$IIDArray =  $_POST ['IIDArray'];
	}

	if(isset($_POST ['courseIDArray'])){
		$courseIDArray =  $_POST ['courseIDArray'];
	}

	if(isset($_POST ['beginTimeArray'])){
		$beginTimeArray =  $_POST ['beginTimeArray'];
	}

	##############################分兩種button################################
    if ( $_REQUEST['rollinbtn'] ) {
	//報到：更新Status: Checkin
	$checkinBtn=mysqli_query($mysqli, "
			UPDATE `appoint` 
			SET `Status`='Checkin'
			WHERE `I_ID`= '$IIDArray[$i]' AND `Course_ID`='$courseIDArray[$i]' AND `Begin_Time`='$beginTimeArray[$i]'
			"); 
    } elseif ( $_REQUEST['cancelbtn'] ) {
	//刪除：更新Status: Cancel (上面SQL抓Course_ID, I_ID, Begin_Time的值存入變數，按下按鈕再透過這些變數去改變相對應STATUS的值)
	$cancelBtn=mysqli_query($mysqli, "
			UPDATE `appoint` 
			SET `Status`='Cancel'
			WHERE `I_ID`='$IIDArray[$i]'  AND `Course_ID`='$courseIDArray[$i]' AND `Begin_Time`='$beginTimeArray[$i]'
			");
    }

    //頁面跳轉
	header( "Location: coursesReserved.php" )


?>

