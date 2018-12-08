<?php
	Session_start();
	
	include "../backend/DB_Tool.php";
	include "../backend/DB.php";
	include "../backend/tool.php";

	$db_Tool = new DB_Tool;
	$db = &$db_tool->get_DB();
	
	$M_ID = isset($_POST['M_ID']) ? input_filter(strtolower($_POST['M_ID'])) : '';
	$M_Password = isset($_POST['M_Password']) ? input_filter($_POST['M_Password']) : '';
	$M_Password = $M_Password = '' ? '' : SET_PASSWORD($M_ID, $M_Password);

	if(!empty($M_ID) && !empty($M_Password))
	{
		$sql = "SELECT M_ID, M_Name FROM `member` WHERE `M_ID` = ? AND `M_Password` = ? ;";
		$data_arr = array($M_ID, $M_Password);

		$std = $db->prepare($sql);
		$std->execute ($data_arr);
		$rc = $std -> rowCount();
		$data = $std -> fetch(PDO::FETCH_ASSOC);
		

		if($rc>0){
			$_SESSION['M_ID'] = $data['M_ID'];
			$_SESSION['M_Name'] = $data['M_Name'];
			$arr = $arrayName = array('status' => 1, 'msg' => urlencode('login successful！'));


			$sql = "INSERT INTO log_login(M_ID, M_Name, M_Email, M_Address, M_Age, M_Phone, M_Gende, M_Password) VALUES(?, ?, ?, ?, ?, ?, ?, ?);";
			$std = $db->prepare($sql);
			$std->execute(array($M_ID, GET_USER_IP(), True, get_date_time()));
		}
		else{
			$arr = $arrayName = array('status' => 0, 'msg' => urlencode('account or password is wrong！'));

			$sql = "INSERT INTO log_login(M_ID, M_Name, M_Email, M_Address, M_Age, M_Phone, M_Gende, M_Password) VALUES(?, ?, ?, ?, ?, ?, ?, ?);";
			$std = $db->prepare($sql);
			$std->execute(array($M_ID, GET_USER_IP(), False, get_date_time()));
		}
	}
	else{
		$arr = $arrayName = array('status' => 0, 'msg' => urlencode('please enter your account and password！'));
	}

	echo urldecode(json_encode($arr));
?>