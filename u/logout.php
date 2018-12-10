<?php if (!isset($_SESSION)){ session_start(); } ?>
<?php

	

	if(isset($_SESSION['ID']))
	{
		Session_destroy();
	}

	$root = 'http://' . $_SERVER['HTTP_HOST'];

	header("Location: ../index.php");
	exit();
?>