<?php if (!isset($_SESSION)){ session_start(); } ?>
<?php
//登入時輸入的內容
$username = $_POST['username'];
$password = $_POST['password'];
$identity = $_POST['identity'];

if($identity=='Member'){
	//會員
	$DB_pwd = mysqli_query($mysqli, "
		SELECT `M_Password`
		FROM `member`
		WHERE `M_ID`= '$username'		
		"); 
	if(!empty($DB_pwd)){	//確保資料庫中有這筆帳號ID
		if($DB_pwd!=$password){	//比對密碼
				echo "WRONG PASSWORD!";
				header("Location: login.php");
				exit; 
			}
			else{
				//成功登入
				$_SESSION['ID']=$username;
				header("Location: ../Member/findAppoint.php"); 
				exit;
			}
		}
		else{
			echo "No such account.";
			header("Location: login.php"); 
			exit;
		}
}
else{
	//教練
	$DB_pwd = mysqli_query($mysqli, "
		SELECT `I_Password`
		FROM `Instructor`
		WHERE `I_ID`= '$username'		
		"); 

	if(!empty($DB_pwd)){	//確保資料庫中有這筆帳號ID
		if($DB_pwd!=$password){	//比對密碼
				echo "WRONG PASSWORD!";
				header("Location: login.php");
				exit; 
			}
			else{
				//成功登入
				$_SESSION['ID']=$username;
				header("Location: ../Instructor/Instructor_Center.php"); 
				exit;
			}
		}
		else{
			echo "No such account.";
			header("Location: login.php"); 
			exit;
		}
}









if ($_POST['username'] == $username && $_POST['password'] == $password ) {
	echo '<meta http-equiv=REFRESH CONTENT=1;url=../Member/coursesBought.php>';
}
else {
	echo '<meta http-equiv=REFRESH CONTENT=1;url=../Instructor/Instructor_Center.php>';	
}

?>