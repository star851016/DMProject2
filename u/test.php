<?php
$username = "1";
$password = "1234";

if ($_POST['username'] == $username && $_POST['password'] == $password ) {
	echo '<meta http-equiv=REFRESH CONTENT=1;url=/Instructor/Instructor_Center.php>';
}
else {
	echo '<meta http-equiv=REFRESH CONTENT=1;url=Member/coursesBought.php>';
}

?>