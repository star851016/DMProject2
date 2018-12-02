<?php

	Session_start();

	if(isset($_SESSION['m_id']))
	{
		Session_destroy();
	}

	$root = 'http://' . $_SERVER['HTTP_HOST'];

	header("Location: $root");
	exit();
?>