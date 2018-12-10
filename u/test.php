<?php

session_start();

#$username = "1";
#$password = "1234";

$username = $_POST['username'];
$password = $_POST['password'];

#$_POST['username'] == $username && $_POST['password'] == $password
if ($_POST['optradio'] =='Member' ) {
	echo '<meta http-equiv=REFRESH CONTENT=1;url=../Member/coursesBought.php>';
	$_SESSION['ID'] = $username;
}
else {
	echo '<meta http-equiv=REFRESH CONTENT=1;url=../Instructor/Instructor_Center.php>';	
	$_SESSION['ID'] = $username;
}

?>