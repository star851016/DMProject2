<?php
	
	function check_to_login()
	{
		Session_start();
		
		$root = 'http://' . $_SERVER['HTTP_HOST'];

		if(!isset($_SESSION['M_ID']) || empty($_SESSION['M_ID']))
		{
			$url = $root . '/u/login.php';
			header("Location: $url");
			exit();
		}
	}

	function check_to_content($path)
	{
		Session_start();
	
		$root = 'http://' . $_SERVER['HTTP_HOST'];

		if(isset($_SESSION['M_ID']) && !empty($_SESSION['M_ID']))
		{
			$url = $root . $path;
			header("Location: $url");
			exit();
		}
	}

	function turn_to_url($path)
	{
		$root = 'http://' . $_SERVER['HTTP_HOST'];

		$url = $root . $path;
		header("Location: $url");
		exit();
	}

	function SET_PASSWORD($M_ID, $M_Password){

		$new_pw = $M_Password;

		for($i = 0; $i < 10; $i++){
			$new_pw = GET_HASH_PW($uid, $new_pw);
		}

		return $new_pw;
	}
?>