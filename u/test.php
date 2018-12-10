<?php if (!isset($_SESSION)){ session_start(); } ?>
<?php
	require_once('../Member/database.php');

//登入時輸入的內容
$username = $_POST['username'];
$password = $_POST['password'];
$identity = $_POST['identity'];

var_dump($_POST);

if($identity=='Member'){
	//會員
	$result = mysqli_query($mysqli, "
		SELECT `M_Password` 
		FROM `member`
		WHERE `M_ID`= '$username'		
		"); 

	while($DB_pwd=mysqli_fetch_row($result)){
		if(!empty($DB_pwd[0])){	//確保資料庫中有這筆帳號ID
			if($DB_pwd[0]!=$password){	//比對密碼
					echo "<script>alert('WRONG PASSWORD!');</script>";
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
				echo "<script>alert('No such account.');</script>";
				header("Location: login.php"); 
				exit;
			}
	}
}
else{
	//教練
	$result = mysqli_query($mysqli, "
		SELECT `I_Password`
		FROM `Instructor`
		WHERE `I_ID`= '$username'		
		"); 

	while($DB_pwd=mysqli_fetch_row($result)){
		if(!empty($DB_pwd)){	//確保資料庫中有這筆帳號ID
			if($DB_pwd!=$password){	//比對密碼
					echo "<script>alert('WRONG PASSWORD!');</script>";
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
				echo "<script>alert('No such account.');</script>";
				header("Location: login.php"); 
				exit;
			}
	}
}

?>