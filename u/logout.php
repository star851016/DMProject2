<?php

	Session_start();

	if(isset($_SESSION['M_ID']))
	{
		Session_destroy();
	}

	$root = 'http://' . $_SERVER['HTTP_HOST'];

	header("Location: ../index.php");
	exit();
?>